<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class UserExport
{
    public function __construct(public object $users) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $headings = [
            trans('field.#'),
            trans('field.id'),
            trans('field.name'),
            trans('field.email'),
            trans('field.phone'),
            trans('field.username'),
            trans('field.is_active'),
            trans('field.roles'),
            trans('index.total').' '.trans('page.property'),
            trans('index.total').' '.trans('page.role'),
            trans('index.total').' '.trans('page.permission'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ];

        $writer->addHeader($headings);

        foreach ($this->users as $index => $user) {
            $writer->addRow([
                $index + 1,
                $user->id,
                $user->name,
                $user->email,
                $user->phone,
                $user->username,
                Str::yesNo($user->is_active),
                $user->roles->pluck('name')->join(', '),
                $user->properties_count,
                $user->roles_count,
                $user->permissions_count,
                $user->createdBy?->name,
                $user->updatedBy?->name,
                (string) $user->created_at,
                (string) $user->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
