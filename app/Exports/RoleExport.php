<?php

namespace App\Exports;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RoleExport
{
    public function __construct(public object $roles) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.name'),
            trans('field.guard_name'),
            trans('index.total').' '.trans('page.permission'),
            trans('index.total').' '.trans('page.user'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->roles as $index => $role) {
            $writer->addRow([
                $index + 1,
                $role->id,
                $role->name,
                $role->guard_name,
                $role->permissions_count,
                $role->users_count,
                (string) $role->created_at,
                (string) $role->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
