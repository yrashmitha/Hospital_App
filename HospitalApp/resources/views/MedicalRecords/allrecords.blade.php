@extends('layouts.layout')

@section('content')

    <section class="row justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#exampleModalCenter">Add New
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
                    <form method="post" action="/medicalrecords">
                        <div class="modal-body">

                            {{@csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Patient Id</label>
                                <input type="number" name="id" class="form-control" id="exampleInputEmail1"
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
    @if (count($records)>0)
        <table class="table table-hover mt-2">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Record Id</th>
                <th scope="col">Name</th>
                <th scope="col">Note</th>
                <th scope="col">Drugs</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody id="record-table">
            @for ($i = 0; $i <count($records) ; $i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$records[$i]->r_id}}</td>
                    <td>{{$records[$i]->patient->p_name}}</td>
                    <td>{{$records[$i]->notes}}</td>
                    <td>{{$records[$i]->drugs}}</td>
                    <td>{{$records[$i]->created_at}}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a>
                                <button type="button" data-toggle="modal" data-target="#editModel" class="btn btn-primary editbtn" id="{{$records[$i]->r_id}}">Edit
                                </button>

                                <div class="modal fade bd-example-modal-xl" id="editModel" tabindex="-1" role="dialog"
                                     aria-labelledby="editModelTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalCenterTitle">Update Record</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" id="editform">
                                                @method('PUT')
                                                <div class="modal-body">

                                                    {{@csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Patient Id</label>
                                                        <input type="number" name="id" disabled class="form-control" id="id"
                                                               aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Note</label>
                                                        <textarea class="form-control" id="notes" name="notes"
                                                                  rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Drugs</label>
                                                        <textarea class="form-control" id="d_input" name="drugs" rows="3"></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Update Record</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <form action="/treatments/{{$records[$i]->r_id}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>


                            <a href="/medicalrecords/{{$records[$i]->r_id}}">
                                <button type="button" class="btn btn-secondary">View</button>
                            </a>


                        </div>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
        <div class="row ">
            <div class="col d-flex justify-content-center">
                {{ $records->links() }}
            </div>

        </div>

    @else
        <h1>No Records</h1>

    @endif
@stop

@section('script')
    <script>
        getElement();

        function getElement() {
            $(".editbtn").off("click");
            $(".editbtn").on('click', function (e) {
                var note = $(this).parent().parent().parent().parent()[0].cells[3].innerHTML;
                var drugs = $(this).parent().parent().parent().parent()[0].cells[4].innerHTML;
                var recordid = $(this).parent().parent().parent().parent()[0].cells[1].innerHTML;

                var url="medicalrecords/"+recordid;
                $('#editform').attr('action', url);

                $("#d_input").val(drugs);
                $("#id").val(recordid);
                $("#notes").val(note);


            })
        }
    </script>
@stop

