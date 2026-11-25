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
            <label>Pojedyńcza płaca</label>
            <input type="text" name="place1" class="form-control" placeholder="Procent" value="{{$place1}}">
        </div>


        <div class="form-group">
            <input type="hidden" value="1" name="save" />
            <input type="submit" class="btn btn-info" value="Oblicz" />
        </div>
    </form>

    @if ($calco)
    <h4>Wynik</h4>

    Jeden : {{ number_format($calco['one'], 0, ".", " ") }}<br />
    Dziesięć : {{ number_format($calco['ten'], 0, ".", " ") }}
    <br />
    Sto : {{ number_format($calco['sto'], 0, ".", " ") }}
    <br />
    Tysiąc : {{ number_format($calco['th'], 0, ".", " ") }}
    <br />
    10 Tysięcy : {{ number_format($calco['th1'], 0, ".", " ") }}
    <br />
    @endif
</div>

@endsection('content')