@extends('layouts.app')




@section('title','Student List')

    @section('content')
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      </head>
<form action="{{URL::to('student/search')}}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group search1">
        <input type="text" class="form-control" name="q"
            placeholder="Search students"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
<form action="{{URL::to('student/dsearch')}}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group" style="width:50%; float:left" >
        <input type="text" class="form-control" name="q"
            placeholder="Search department student list"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
<form action="{{URL::to('student/csearch')}}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group" style="width:50%; float:right">
        <input type="text" class="form-control" name="q"
            placeholder="Search class student list"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
        </form>
        <div class="table-wrapper-scroll-y my-custom-scrollbar" >
            <div class="card-body">
                Student List || <a href="{{ url('student/create') }}">Add Student</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered table-striped mb-0" >
                <thead>
                <tr>
                    <th scope="col">Reg ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Mother's Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Home Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Class</th>
                    <th scope="col">Roll number</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as  $data)
                <tr>
                    <th scope="row">{{ $data->reg_id}}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->father_name }}</td>
                    <td>{{ $data->mother_name }}</td>
                    <td>{{ $data->phone_number }}</td>
                    <td>{{ $data->home_number }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->department->title }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->blood_group }}</td>
                    <td>{{ $data->classes->title }}</td>
                    <td>{{ $data->roll }}</td>
                    <td>
                        <a href="{{ url('student/edit',$data->id) }}">Edit</a> ||
                        <form id="delete-form-{{ $data->id }}" method="post" action="{{ url('student/delete', $data->id) }}" style="display: none">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                        </form>

                        <a href="" onclick="
                                if(confirm('Are you sure, You want to Delete this ??'))
                                {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $data->id }}').submit();
                                }
                                else {
                                event.preventDefault();
                                }">Delete
                        </a>
                    </td>
                </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
        </div>

     @endsection
