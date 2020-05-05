@extends('layouts.layout')

@section('content')

    <form method="post" action="/patients">
        {{@csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Age</label>
            <input type="number" name="age" class="form-control"  id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Gender</label>
            <select class="form-control" name="gender" id="exampleFormControlSelect1">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
