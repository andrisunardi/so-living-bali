<table>
    <thead>
        <tr>
            <th align="center" colspan="13">
                <b>{{ trans('page.faq') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="13"></td>
        </tr>
        <tr>
            <th align="center" colspan="13">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="13"></td>
        </tr>
        <tr>
            <th align="center"><b>{{ trans('field.#') }}</b></th>
            <th align="center"><b>{{ trans('field.id') }}</b></th>
            <th align="center"><b>{{ trans('field.question') }}</b></th>
            <th align="center"><b>{{ trans('field.question_id') }}</b></th>
            <th align="center"><b>{{ trans('field.question_fr') }}</b></th>
            <th align="center"><b>{{ trans('field.answer') }}</b></th>
            <th align="center"><b>{{ trans('field.answer_id') }}</b></th>
            <th align="center"><b>{{ trans('field.answer_fr') }}</b></th>
            <th align="center"><b>{{ trans('field.active') }}</b></th>
            <th align="center"><b>{{ trans('field.created_by') }}</b></th>
            <th align="center"><b>{{ trans('field.updated_by') }}</b></th>
            <th align="center"><b>{{ trans('field.created_at') }}</b></th>
            <th align="center"><b>{{ trans('field.updated_at') }}</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($faqs as $faq)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $faq->id }}</td>
                <td align="left">{{ $faq->question }}</td>
                <td align="left">{{ $faq->question_id }}</td>
                <td align="left">{{ $faq->question_fr }}</td>
                <td align="left">{{ $faq->answer }}</td>
                <td align="left">{{ $faq->answer_id }}</td>
                <td align="left">{{ $faq->answer_fr }}</td>
                <td align="center">{{ Str::yesNo($faq->is_active) }}</td>
                <td align="left">{{ $faq->createdBy?->name }}</td>
                <td align="left">{{ $faq->updatedBy?->name }}</td>
                <td align="left">{{ $faq->created_at }}</td>
                <td align="left">{{ $faq->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="13">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="13"></td>
        </tr>
    </tfoot>
</table>
