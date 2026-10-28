<?php

namespace App\Exports;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactExport
{
    public function __construct(public object $contacts) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.code'),
            trans('field.name'),
            trans('field.first_name'),
            trans('field.last_name'),
            trans('field.company'),
            trans('field.email'),
            trans('field.phone'),
            trans('field.district'),
            trans('field.area'),
            trans('field.bedroom'),
            trans('field.rental_type'),
            trans('field.message'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->contacts as $index => $contact) {
            $writer->addRow([
                $index + 1,
                $contact->id,
                $contact->code,
                $contact->name,
                $contact->first_name,
                $contact->last_name,
                $contact->company,
                $contact->email,
                $contact->phone,
                $contact->area?->district?->name,
                $contact->area?->name,
                $contact->bedroom?->description(),
                $contact->rental_type?->description(),
                $contact->message,
                $contact->createdBy?->name,
                $contact->updatedBy?->name,
                (string) $contact->created_at,
                (string) $contact->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
