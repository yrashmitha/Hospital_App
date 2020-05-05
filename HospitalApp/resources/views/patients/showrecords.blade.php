@extends('layouts.layout')

@section('content')
    @foreach ($patient->medicalRecords as $record)
        {{$record->r_id}}
        {{$record->drugs}}
    @endforeach
@stop
