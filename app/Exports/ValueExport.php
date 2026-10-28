<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ValueExport
{
    public function __construct(public object $values) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.title'),
            trans('field.title_id'),
            trans('field.title_fr'),
            trans('field.short_description'),
            trans('field.short_description_id'),
            trans('field.short_description_fr'),
            trans('field.description'),
            trans('field.description_id'),
            trans('field.description_fr'),
            trans('field.icon'),
            trans('field.active'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->values as $index => $value) {
            $writer->addRow([
                $index + 1,
                $value->id,
                $value->title,
                $value->title_id,
                $value->title_fr,
                $value->short_description,
                $value->short_description_id,
                $value->short_description_fr,
                $value->description,
                $value->description_id,
                $value->description_fr,
                $value->icon,
                Str::yesNo($value->is_active),
                $value->createdBy?->name,
                $value->updatedBy?->name,
                (string) $value->created_at,
                (string) $value->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
