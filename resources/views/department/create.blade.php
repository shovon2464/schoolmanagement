@extends('layouts.app')

@section('title', 'Add new departments')

     @section('content')

    <div class="container">
                <div class="card">
                    <div class="card-header">Add Department </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                          </div>
                     @endif

                    <div class="card-body">
                        <form method="POST" action="{{url ('department/save')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

     @endsection
