<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GuideCategoryExport
{
    public function __construct(public object $guideCategories) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.name'),
            trans('field.name_id'),
            trans('field.name_fr'),
            trans('field.show'),
            trans('field.active'),
            trans('index.total').' '.trans('page.guide'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->guideCategories as $index => $guideCategory) {
            $writer->addRow([
                $index + 1,
                $guideCategory->id,
                $guideCategory->name,
                $guideCategory->name_id,
                $guideCategory->name_fr,
                Str::yesNo($guideCategory->is_show),
                Str::yesNo($guideCategory->is_active),
                $guideCategory->guides_count,
                $guideCategory->createdBy?->name,
                $guideCategory->updatedBy?->name,
                (string) $guideCategory->created_at,
                (string) $guideCategory->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
