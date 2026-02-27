<div>
    @if ($errors?->any() ?? null)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $message)
                {{ $message }}
                @if (!$loop->last)
                    <br />
                @endif
            @endforeach
        </div>
    @endif
</div>
