<?php

namespace App\Exports;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class OauthExport
{
    public function __construct(public object $oauths) {}

    public function download(string $filename): StreamedResponse
    {
        $writer = SimpleExcelWriter::streamDownload($filename);

        $writer->addHeader([
            trans('field.#'),
            trans('field.id'),
            trans('field.code'),
            trans('field.name'),
            trans('field.refresh_token'),
            trans('field.access_token'),
            trans('field.token_type'),
            trans('field.expires_in'),
            trans('field.scope'),
            trans('field.created'),
            trans('field.created_by'),
            trans('field.updated_by'),
            trans('field.created_at'),
            trans('field.updated_at'),
        ]);

        foreach ($this->oauths as $index => $oauth) {
            $writer->addRow([
                $index + 1,
                $oauth->id,
                $oauth->code,
                $oauth->name,
                $oauth->refresh_token,
                $oauth->access_token,
                $oauth->token_type,
                $oauth->expires_in,
                $oauth->scope,
                (string) $oauth->created,
                $oauth->createdBy?->name,
                $oauth->updatedBy?->name,
                (string) $oauth->created_at,
                (string) $oauth->updated_at,
            ]);
        }

        return $writer->toBrowser();
    }
}
