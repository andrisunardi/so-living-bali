<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GuideExport
{
    public function __construct(public object $guides) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.guide_category_id'),
            trans('field.title'),
            trans('field.title_id'),
            trans('field.title_fr'),
            trans('field.google_file_id'),
            trans('field.image_url'),
            trans('field.show'),
            trans('field.active'),
            trans('field.slug'),
            trans('field.counter'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->guides as $index => $guide) {
            $writer->addRow([
                $index + 1,
                $guide->id,
                $guide->category?->name,
                $guide->title,
                $guide->title_id,
                $guide->title_fr,
                $guide->google_file_id,
                $guide->image_url,
                Str::yesNo($guide->is_show),
                Str::yesNo($guide->is_active),
                $guide->slug,
                $guide->counter,
                $guide->createdBy?->name,
                $guide->updatedBy?->name,
                (string) $guide->created_at,
                (string) $guide->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
