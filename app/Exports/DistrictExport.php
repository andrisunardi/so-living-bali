<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DistrictExport
{
    public function __construct(public object $districts) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.name'),
            trans('field.show'),
            trans('field.active'),
            trans('index.total').' '.trans('page.area'),
            trans('index.total').' '.trans('page.contact'),
            trans('index.total').' '.trans('page.property'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->districts as $index => $district) {
            $writer->addRow([
                $index + 1,
                $district->id,
                $district->name,
                Str::yesNo($district->is_show),
                Str::yesNo($district->is_active),
                $district->areas_count,
                $district->contacts_count,
                $district->properties_count,
                $district->createdBy?->name,
                $district->updatedBy?->name,
                (string) $district->created_at,
                (string) $district->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
