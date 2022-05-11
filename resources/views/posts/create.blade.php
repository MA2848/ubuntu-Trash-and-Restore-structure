@extends('layouts.app')
@section('title','create')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-default">
                  <div class="card-header"><b>Create Posts</b></div>
                  <div class="card-body">
                     <form action="{{ route('posts.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                             placeholder="Enter title" name="title" value="{{ old('title') }}">

                            @error('title')
                            <span class="text-danger small "> {{ $message }} </span>
                            @enderror

                        </div>

                        <div class="form-group">
                          <input type="text" class="form-control  @error('email') is-invalid @enderror"
                           placeholder="Enter Email" name="email" value={{ old('email') }}>

                          @error('email')
                          <span class="text-danger small"> {{ $message }} </span>
                          @enderror

                       </div>

                        <div class="form-grup">
                            <textarea class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter Description" name="description" cols="5" rows="5">
                            {{ old('description') }}
                            </textarea>

                            @error('description')
                            <span class="text-danger small"> {{ $message }} </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-sm btn-block shadow mt-3">Create</button>
                        </div>

                     </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
