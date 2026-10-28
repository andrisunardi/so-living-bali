<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AreaExport
{
    public function __construct(public object $areas) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.district_id'),
            trans('field.name'),
            trans('field.promoted'),
            trans('field.show'),
            trans('field.active'),
            trans('index.total').' '.trans('page.contact'),
            trans('index.total').' '.trans('page.property'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->areas as $index => $area) {
            $writer->addRow([
                $index + 1,
                $area->id,
                $area->district?->name,
                $area->name,
                Str::yesNo($area->is_promoted),
                Str::yesNo($area->is_show),
                Str::yesNo($area->is_active),
                $area->contacts_count,
                $area->properties_count,
                $area->createdBy?->name,
                $area->updatedBy?->name,
                (string) $area->created_at,
                (string) $area->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
