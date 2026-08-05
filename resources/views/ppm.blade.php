@extends('template')
@section('content')

<a href="/" class=" btn btn-primary"> Strona główna</button></a>
<h3>PPM Calc</h3>

@if (isset($errorforms) && $errorforms != "")
<div class="alert alert-danger" role="alert">
    {{$errorforms}}
</div>
@endif

<div class="container">
    <form action="" method="Post">
        @csrf
        <div class="form-group">
            <label>Masa (tony)</label>
            <input type="text" name="masa" class="form-control" placeholder="Masa" value="{{$masa}}">
        </div>
        <div class="form-group">
            <label>PPM</label>
            <input type="text" name="ppm" class="form-control" placeholder="PPM" value="{{$ppm}}">
        </div>
        <div class="form-group">
            <input type="hidden" value="1" name="save" />

            <input type="submit" class="btn btn-info" value="Oblicz" />
        </div>
    </form>

    @if ($calco)
    <h4>Masa</h4>
    Surowiec : {{$masa}} Tony<br />
    PPM : {{$ppm}} PPM<br />
    Waga : {{$calco['res']}} kg<br />
    @endif
</div>

@endsection('content')