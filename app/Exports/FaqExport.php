<?php

namespace App\Exports;

use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FaqExport
{
    public function __construct(public object $faqs) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.question'),
            trans('field.question_id'),
            trans('field.question_fr'),
            trans('field.answer'),
            trans('field.answer_id'),
            trans('field.answer_fr'),
            trans('field.active'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->faqs as $index => $faq) {
            $writer->addRow([
                $index + 1,
                $faq->id,
                $faq->question,
                $faq->question_id,
                $faq->question_fr,
                $faq->answer,
                $faq->answer_id,
                $faq->answer_fr,
                Str::yesNo($faq->is_active),
                $faq->createdBy?->name,
                $faq->updatedBy?->name,
                (string) $faq->created_at,
                (string) $faq->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
