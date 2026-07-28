@extends('template')
@section('content')

<a href="/" class=" btn btn-primary"> Strona główna</button></a>
<h3>Kombinacja sylab</h3>

@if (isset($errorforms) && $errorforms != "")
<div class="alert alert-danger" role="alert">
    {{$errorforms}}
</div>
@endif

<div class="container">
    <form action="" method="Post">
        @csrf
        <div class="form-group">
            <label>Sylaby - podaj po przecinku</label>
            <input type="text" name="sylabize" class="form-control" placeholder="Sylaby" value="{{$sylabize}}">
        </div>

        <div class="form-group">
            <input type="hidden" value="1" name="save" />
            <input type="submit" class="btn btn-info" value="Twórz" />
        </div>
    </form>

    @if ($result)
    <h3>Wyniki</h3>
    {!! nl2br($result) !!}
    @endif
</div>

@endsection('content')