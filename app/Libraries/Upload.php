<?php

namespace App\Libraries;

use Buglinjo\LaravelWebp\Facades\Webp;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Upload
{
    public function image(
        TemporaryUploadedFile $image,
        string $directory,
        string $name
    ): string {
        $env = App::environment();
        $disk = Storage::disk('google');
        $application = Str::slug(config('app.name'));
        $datetime = now()->format('Y-m-d-H-i-s');

        $name = Str::slug($name);
        $name = "{$name}-{$datetime}.webp";

        $path = "{$env}/{$application}/{$directory}/{$name}";

        if ($image->extension() === 'webp') {
            $disk->put($path, $image->get());
        } else {
            $webpTmp = "webp-tmp/{$name}";
            Webp::make($image)->quality(70)->save(Storage::path($webpTmp));

            $disk->put($path, Storage::readStream($webpTmp));
            Storage::delete($webpTmp);
        }

        return $path;
    }

    public function file(
        TemporaryUploadedFile $file,
        string $directory,
        string $name
    ) {
        $env = App::environment();
        $disk = Storage::disk('google');
        $application = Str::slug(config('app.name'));
        $datetime = now()->format('Y-m-d-H-i-s');

        $name = Str::slug($name);
        $name = "{$name}-{$datetime}.{$file->extension()}";
        $path = "{$env}/{$application}/{$directory}/{$name}";

        $disk->put($path, $file->get());

        return config('filesystems.disks.google.url')."/{$path}";
    }
}
