<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PropertyExport
{
    public function __construct(public object $properties) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.code'),
            trans('field.name'),
            trans('field.district_id'),
            trans('field.area_id'),
            trans('field.image'),
            trans('field.monthly_price'),
            trans('field.yearly_price'),
            trans('field.description'),
            trans('field.fully_furnished'),
            trans('field.pool'),
            trans('field.bedroom'),
            trans('field.land_size'),
            trans('field.building_size'),
            trans('field.rental_type'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->properties as $index => $property) {
            $writer->addRow([
                $index + 1,
                $property->id,
                $property->code,
                $property->name,
                $property->district?->name,
                $property->area?->name,
                $property->image?->image_url,
                $property->monthly_price,
                $property->yearly_price,
                Str::of($property->description)->replace(['<br>', '<br/>', '<br />'], PHP_EOL)->stripTags()->toString(),
                Str::yesNo($property->fully_furnished),
                Str::yesNo($property->pool_size),
                $property->bedroom?->value,
                $property->land_size,
                $property->building_size,
                $property->rental_type?->name,
                (string) $property->created_at,
                (string) $property->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
