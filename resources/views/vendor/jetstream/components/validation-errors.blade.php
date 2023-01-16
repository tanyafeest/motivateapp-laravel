@if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            notify()->error($error);
        @endphp
    @endforeach
@endif