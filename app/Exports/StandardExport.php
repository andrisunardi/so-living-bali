<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StandardExport
{
    public function __construct(public object $standards) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.title'),
            trans('field.title_id'),
            trans('field.title_fr'),
            trans('field.description'),
            trans('field.description_id'),
            trans('field.description_fr'),
            trans('field.active'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->standards as $index => $standard) {
            $writer->addRow([
                $index + 1,
                $standard->id,
                $standard->title,
                $standard->title_id,
                $standard->title_fr,
                $standard->description,
                $standard->description_id,
                $standard->description_fr,
                Str::yesNo($standard->is_active),
                $standard->createdBy?->name,
                $standard->updatedBy?->name,
                (string) $standard->created_at,
                (string) $standard->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
