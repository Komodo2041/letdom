@extends('template')
@section('content')

<a href="/" class=" btn btn-primary"> Strona główna</button></a>
<h3>Liczenie średniej płacy</h3>

@if (isset($errorforms) && $errorforms != "")
<div class="alert alert-danger" role="alert">
    {{$errorforms}}
</div>
@endif

<div class="container">
    <form action="" method="Post">
        @csrf
        <div class="form-group">
            <label>Liczba 1 grupy</label>
            <input type="text" name="lg1" class="form-control" placeholder="Procent" value="{{$lg1}}">
        </div>
        <div class="form-group">
            <label>Płaca 1 grupy</label>
            <input type="text" name="place1" class="form-control" placeholder="Procent" value="{{$place1}}">
        </div>

        <div class="form-group">
            <label>Liczba 2 grupy</label>
            <input type="text" name="lg2" class="form-control" placeholder="Procent" value="{{$lg2}}">
        </div>
        <div class="form-group">
            <label>Płaca 2 grupy</label>
            <input type="text" name="place2" class="form-control" placeholder="Procent" value="{{$place2}}">
        </div>

        <div class="form-group">
            <input type="hidden" value="1" name="save" />
            <input type="submit" class="btn btn-info" value="Oblicz" />
        </div>
    </form>

    @if ($calco)
    <h4>Wynik</h4>

    Avg : {{$calco['avg']}}<br />
    C1 : {{$calco['c1']}}<br />
    C2 : {{$calco['c2']}}<br />
    @endif
</div>

@endsection('content')