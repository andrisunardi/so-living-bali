<table>
    <thead>
        <tr>
            <th align="center" colspan="14">
                <b>{{ trans('page.oauth') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr>
            <th align="center" colspan="14">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>{{ trans('field.#') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.code') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.name') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.refresh_token') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.access_token') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.token_type') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.expires_in') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.scope') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.created') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.created_by') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.updated_by') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.created_at') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.updated_at') }}</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($oauths as $oauth)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $oauth->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->code }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->refresh_token }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->access_token }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->token_type }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->expires_in }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->scope }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->created }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->createdBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->updatedBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $oauth->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="14">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="14"></td>
        </tr>
    </tfoot>
</table>
