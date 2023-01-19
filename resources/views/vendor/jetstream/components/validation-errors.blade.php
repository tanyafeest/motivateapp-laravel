@if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            toast()
                ->danger($error)
                ->push();
        @endphp
    @endforeach
@endif