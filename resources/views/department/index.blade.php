@extends('layouts.app')

@section('title', 'Departments')

     @section('content')

     <!-- <h1><a href="{{url('department/create')}}">add new Department</a> </h1> -->

     <div class="card">
         <div class="card-body">
              Department List || <a href="{{ url('department/create') }}">Add Department</a>
         </div>

          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
              </div>
            @endif

     <table class="table">
       <thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Title</th>
           <th scope="col">Action</th>
         </tr>
       </thead>

       <tbody>
       @foreach($departments as $department)
       <tr>
          <th scope='row'> {{ $department->id }}</th>
          <td>{{$department->title}} </td>
          <td>
           <a href="{{url ('department/edit', $department->id) }}">Edit</a>
          <form id="delete-form-{{$department->id}}" method="post" action="{{url ('department/delete', $department->id)}}"  >
          {{csrf_field()}}
          {{ method_field('delete') }}
          </form>

          <a href="" onclick="
                  if(confirm('are you sure, You want to Delete this ??'))
                  {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $department->id }}').submit();
                  }
                  else{
                     event.preventDefault();
                  }"> Delete </a>
                  </td>

       </tr>
         @endforeach



       </tbody>
     </table>
       </div>

     @endsection
