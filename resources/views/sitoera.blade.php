@extends('template')
@section('content')

<a href="/" class=" btn btn-primary"> Strona główna</button></a>
<h3>Rotacje</h3>

@if (isset($errorforms) && $errorforms != "")
<div class="alert alert-danger" role="alert">
    {{$errorforms}}
</div>
@endif

<div class="container">
    <form action="" method="Post">
        @csrf
        <div class="form-group">
            <label>Numer</label>
            <input type="text" name="nr" class="form-control" placeholder="Obroty" value="{{$nr}}">
        </div>

        <div class="form-group">
            <input type="hidden" value="1" name="save" />

            <input type="submit" class="btn btn-info" value="Pokaż Sito" />
        </div>
    </form>

    @if ($result)
    <table id="colortable">
        @foreach ($result AS $record)
        <tr>
            @foreach ($record AS $key => $value)
            <td @if ($value==0) class="red" @endif>{{$key}}</td>
            @endforeach
        </tr>
        @endforeach
    </table>
    @endif
</div>

@endsection('content')