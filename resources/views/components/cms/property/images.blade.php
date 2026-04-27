<?php

use App\Enums\Currency;
use App\Enums\Language;
use App\Libraries\GoogleDrive;
use App\Livewire\Component;
use Livewire\Attributes\Lazy;

new #[Lazy] class extends Component {
    public array $driveImages = [];

    public array $selectedImages = [];

    public function mount($selectedImages = [])
    {
        $this->selectedImages = $selectedImages;
        $this->loadImages();
    }

    public function loadImages()
    {
        $google = new GoogleDrive();

        $folderId = config('constants.folder_id.property');

        $this->driveImages = collect($google->listImages($folderId)['files'])
            ->map(
                fn($file) => [
                    'id' => $file->id,
                    'name' => $file->name,
                    'thumbnail' => $file->thumbnailLink,
                ],
            )
            ->toArray();
    }

    public function toggleSelect($id)
    {
        if (in_array($id, $this->selectedImages)) {
            $this->selectedImages = array_values(
                array_filter(
                    $this->selectedImages,

                    fn($i) => $i !== $id,
                ),
            );
        } else {
            $this->selectedImages[] = $id;
        }
        $this->dispatch('imagesUpdated', images: $this->selectedImages);
    }
};
?>

<div wire:init="loadImages">
    <div wire:loading>
        Loading images...
    </div>

    <div wire:loading.remove class="row">
        @foreach ($driveImages as $file)
            @php
                $selected = in_array($file['id'], $selectedImages);
            @endphp

            <div class="col-6 col-md-3 mb-3">
                <div class="card h-100 position-relative" wire:click="toggleSelect('{{ $file['id'] }}')"
                    style="cursor:pointer; border: {{ $selected ? '3px solid #0d6efd' : '1px solid #ddd' }}">
                    <img src="{{ $file['thumbnail'] }}" class="card-img-top" style="height:150px; object-fit:cover;">

                    @if ($selected)
                        <div class="position-absolute top-0 end-0 m-2 bg-primary text-white rounded-circle px-2">
                            ✓
                        </div>
                    @endif

                    <div class="card-body p-2 text-center">
                        <small class="text-truncate d-block">
                            {{ $file['name'] }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
