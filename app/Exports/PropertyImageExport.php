<?php

namespace App\Exports;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PropertyImageExport
{
    public function __construct(public object $propertyImages) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.property_id'),
            trans('field.name'),
            trans('field.description'),
            trans('field.image_url'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->propertyImages as $index => $propertyImage) {
            $writer->addRow([
                $index + 1,
                $propertyImage->id,
                $propertyImage->property?->code,
                $propertyImage->name,
                $propertyImage->google_file_id,
                $propertyImage->image_url,
                $propertyImage->createdBy?->name,
                $propertyImage->updatedBy?->name,
                (string) $propertyImage->created_at,
                (string) $propertyImage->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
