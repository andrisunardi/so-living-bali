<?php

namespace App\Exports;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TestimonialExport
{
    public function __construct(public object $testimonials) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.name'),
            trans('field.job'),
            trans('field.company'),
            trans('field.word'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->testimonials as $index => $testimonial) {
            $writer->addRow([
                $index + 1,
                $testimonial->id,
                $testimonial->name,
                $testimonial->job,
                $testimonial->company,
                $testimonial->word,
                $testimonial->createdBy?->name,
                $testimonial->updatedBy?->name,
                (string) $testimonial->created_at,
                (string) $testimonial->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
