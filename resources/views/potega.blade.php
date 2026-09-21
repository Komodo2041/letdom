@extends('template')
@section('content')

<a href="/" class=" btn btn-primary"> Strona główna</button></a>
<h3>Liczenie poteg</h3>

@if (isset($errorforms) && $errorforms != "")
<div class="alert alert-danger" role="alert">
    {{$errorforms}}
</div>
@endif

<div class="container">
    <form action="" method="Post">
        @csrf
        <div class="form-group">
            <label>Procent %</label>
            <input type="text" name="percent" class="form-control" placeholder="Procent" value="{{$percent}}">
        </div>

        <div class="form-group">
            <input type="hidden" value="1" name="save" />
            <input type="submit" class="btn btn-info" value="Oblicz" />
        </div>
    </form>

    @if ($calco)
    <h4>Procent</h4>
    Procent : {{$percent}} %<br />
    10 lat : {{$calco['10']}}<br />
    20 lat : {{$calco['20']}}<br />
    50 lat : {{$calco['50']}}<br />
    Podwojenie : {{$calco['two']}}<br />
    @endif
</div>

@endsection('content')