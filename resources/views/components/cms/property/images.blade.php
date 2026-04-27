<?php

use App\Enums\Currency;
use App\Enums\Language;
use App\Libraries\GoogleDrive;
use App\Livewire\Component;
use Livewire\Attributes\Lazy;

new #[Lazy] class extends Component {
    public array $selectedImages = [];

    public string $rootFolderId = '13alt2Sqn0xIsndoTa0ZG1jSqns1jsBg3';

    public string $currentFolderId;

    public array $files = [];

    public array $folderStack = [];

    public function mount($selectedImages = [])
    {
        $this->selectedImages = $selectedImages;
        // $this->rootFolderId = config('constants.folder_id.property');
        $this->currentFolderId = $this->rootFolderId;
        $this->loadFiles();
    }

    public function loadFiles()
    {
        $google = new GoogleDrive();
        $this->files = $google->listFiles($this->currentFolderId);
    }

    public function toggleSelect($id)
    {
        if (in_array($id, $this->selectedImages)) {
            $this->selectedImages = array_values(array_filter($this->selectedImages, fn($i) => $i !== $id));
        } else {
            $this->selectedImages[] = $id;
        }
        $this->dispatch('imagesUpdated', images: $this->selectedImages);
    }

    public function open($file)
    {
        if ($file['type'] === 'folder') {
            $this->folderStack[] = [
                'id' => $this->currentFolderId,
                'name' => $file['name'],
            ];

            $this->currentFolderId = $file['id'];
            $this->currentFolderName = $file['name'];

            $this->loadFiles();
        } else {
            $this->toggleSelect($file['id']);
        }
    }

    public function goTo($index)
    {
        $folder = $this->folderStack[$index];

        $this->currentFolderId = $folder['id'];
        $this->folderStack = array_slice($this->folderStack, 0, $index);

        $this->loadFiles();
    }

    public function goRoot()
    {
        $this->folderStack = [];
        $this->currentFolderId = $this->rootFolderId;

        $this->loadFiles();
    }
};
?>

<div wire:init="loadFiles">
    {{-- <div wire:loading>
        Loading images...
    </div> --}}

    @if (count($folderStack))
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#" wire:click.prevent="goRoot">
                        Root
                    </a>
                </li>

                @foreach ($folderStack as $index => $folder)
                    <li class="breadcrumb-item">
                        <a href="#" wire:click.prevent="goTo({{ $index }})">
                            {{ $folder['name'] }}
                        </a>
                    </li>
                @endforeach

                <li class="breadcrumb-item active">
                    {{ $currentFolderName ?? 'Folder' }}
                </li>
            </ol>
        </nav>
    @endif

    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
        @foreach ($files as $file)
            <div class="col" wire:key="file-{{ $file['id'] }}">
                <div class="card h-100 text-center pointer {{ in_array($file['id'], $selectedImages) ? 'bg-primary-subtle' : '' }}"
                    wire:click="open(@js($file))">
                    @if ($file['type'] === 'folder')
                        <div class="ratio ratio-1x1">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="fas fa-folder fa-2x"></span>
                            </div>
                        </div>
                    @else
                        <div class="ratio ratio-1x1">
                            <img draggable="false" loading="lazy" decoding="async"
                                class="img-fluid w-100 h-100 object-fit-cover" src="{{ $file['thumbnail'] }}">
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="text-truncate">{{ $file['name'] }}</div>
                        <div class="small">{{ Str::filesize($file['size']) }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
