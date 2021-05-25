@if (count($errors) > 0)
    @foreach ($errors->all as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

{{-- @if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif --}}

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif