@if (!$films->isEmpty())
    @foreach ($films as $singlefilm)
        <p>{{ $singlefilm->name }}</p><br>
    @endforeach
@else
    <p>No films</p>
@endif
