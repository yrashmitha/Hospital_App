@extends('layouts.layout')
@section('content')

    <section class="row justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#exampleModalCenter">Add New
            Patients
        </button>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalCenterTitle">Add new Patient</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/patients">
                        <div class="modal-body">
                            {{@csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" required class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Age</label>
                                <input type="number" name="age" required class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" name="address" required class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Gender</label>
                                <select class="form-control" required name="gender" id="exampleFormControlSelect1">
                                    <option>--Select--</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add Patient</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    @if (count($patients)>0)
        <table class="table table-hover mt-2">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Gender</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i <count($patients) ; $i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$patients[$i]->p_name}}</td>
                    <td>{{$patients[$i]->age}}</td>
                    <td>{{$patients[$i]->address}}</td>
                    <td>{{$patients[$i]->gender}}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/patients/{{$patients[$i]->p_id}}">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                            <form action="patients/{{$patients[$i]->p_id}}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
        <div class="row ">
            <div class="col d-flex justify-content-center">
                {{ $patients->links() }}
            </div>

        </div>

    @else
        <h1>No patients found</h1>
    @endif


@stop
