@extends('layouts.layout')

@section('content')

    <section class="row m-3">
        <section class="col-6 border-dark border-right">
            <h4 class="text-center mb-4">Patient Details</h4>
            <hr>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row"> Id</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->patient->p_id}}</a>
                    </div>
                </section>
            </section>

            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row"> Name</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->patient->p_name}}</a>
                    </div>
                </section>
            </section>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row"> Address</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->patient->address}}</a>
                    </div>
                </section>
            </section>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row"> Age</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->patient->age}}</a>
                    </div>
                </section>
            </section>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row"> Gender</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->patient->gender}}</a>
                    </div>
                </section>
            </section>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row">Joined At</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->patient->created_at}}</a>
                    </div>
                </section>
            </section>
        </section>
        <section class="col-6">
            <h4 class="text-center mb-4">Record Details</h4>
            <hr>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row">Record Id</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->r_id}}</a>
                    </div>
                </section>
            </section>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row">Notes</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->notes}}</a>
                    </div>
                </section>
            </section>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row">Issued Drugs</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$record->drugs}}</a>
                    </div>
                </section>
            </section>
            <section class="row">
                <section class="col-4 d-flex align-items-center"><h5 class="flex-row">Treated By</h5></section>
                <section class="col-8">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                           Dr. {{$record->doctor->d_name}}</a>
                    </div>
                </section>
            </section>
        </section>
    </section>

@stop
