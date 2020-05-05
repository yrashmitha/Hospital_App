@extends('layouts.layout')
@section('content')
    <h1>index works</h1>
    <h2>{{$name}}</h2>

    @if (count($abilities)>0)
        @foreach ($abilities as $abi)
            <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item">{{$abi}}</li>
            </ul>
        @endforeach
    @endif
@stop

