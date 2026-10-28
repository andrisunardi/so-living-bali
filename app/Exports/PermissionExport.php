<?php

namespace App\Exports;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PermissionExport
{
    public function __construct(public object $permissions) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.name'),
            trans('field.guard_name'),
            trans('field.roles'),
            trans('index.total').' '.trans('page.permission'),
            trans('index.total').' '.trans('page.user'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->permissions as $index => $permission) {
            $writer->addRow([
                $index + 1,
                $permission->id,
                $permission->name,
                $permission->guard_name,
                $permission->roles->pluck('name')->join(', '),
                $permission->roles_count,
                $permission->users_count,
                (string) $permission->created_at,
                (string) $permission->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
