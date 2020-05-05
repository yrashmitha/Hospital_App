@extends('layouts.layout')

@section('content')

    <section class="row mt-3">
        <section class="col-6 border-right border-primary">
            <h4 class="text-center mb-4">Patient Details</h4>
            <hr>
            <form method="post" action="/patients/{{$patient->p_id}}">
                @method('PUT')
                {{@csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{$patient->p_name}}" class="form-control"
                           id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Age</label>
                    <input type="number" value="{{$patient->age}}" name="age" class="form-control"
                           id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" name="address" value="{{$patient->address}}" class="form-control"
                           id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Gender</label>
                    <select class="form-control" name="gender" id="exampleFormControlSelect1">
                        @if ($patient->gender==='Male')
                            <option selected>Male</option>
                            <option>Female</option>
                        @endif
                        @if ($patient->gender==='Female')
                            <option>Male</option>
                            <option selected>Female</option>
                        @endif
                        {{--<option >Male</option>--}}
                        {{--<option selected>Female</option>--}}


                    </select>
                </div>

                <button type="submit" class="btn btn-outline-success">Update</button>
            </form>

            {{--add new record button and model--}}

            <button type="button" id="addBtn" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModalCenter">Add New
                Record
            </button>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add new Record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="/medicalrecords/{{$patient->p_id}}/records">
                            <div class="modal-body">

                                {{@csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Patient Id</label>
                                    <input type="number"  name="id" class="form-control" id="id"
                                           aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Note</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="notes"
                                              rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Drugs</label>
                                    <textarea class="form-control" id="drugs" name="drugs" rows="3"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Record</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </section>
        <section class="col-6">
            <h4 class="text-center mb-4">Record Details</h4>
            <hr>
            @if (count($patient->medicalRecords)>0)
                <div class="accordio"id="accordionExample">

                @foreach ($patient->medicalRecords->sortByDesc('r_id') as $record)

                        <div class="card">
                            <div class="card-header text-center bg-success" id="headingOne">
                                <h2 class="mb-0 d-flex justify-content-center align-items-center">
                                    <button class="btn btn-link nav-link text-center text-dark font-weight-bold" type="button" data-toggle="collapse"
                                            data-target="#collapseOne{{$record->r_id}}" aria-controls="collapseOne">
                                        Record Id - {{$record->r_id}} created from Dr.{{$record->doctor->d_name}}<br>
                                        {{$record->created_at}}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne{{$record->r_id}}" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="border-dark border m-2">
                                        <div class="row d-flex flex-column justify-content-center">
                                            <h5 class="text-center font-weight-bolder">Drugs</h5>
                                            <h5 class="text-center">{{$record->drugs}}</h5>
                                        </div>
                                    </div>
                                    <div class="border-dark border m-2">
                                        <div class="row d-flex flex-column justify-content-center">
                                            <h5 class="text-center font-weight-bolder ">Notes</h5>
                                            <h5 class="text-center">{{$record->notes}}</h5>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>

                @endforeach
                </div>
            @else
                <h4>No records found!</h4>
            @endif
        </section>
    </section>

@stop

@section('script')

    <script>
        $("#addBtn").click(function () {
            $("#id").val("{{$patient->p_id}}");
        })
    </script>

@stop
