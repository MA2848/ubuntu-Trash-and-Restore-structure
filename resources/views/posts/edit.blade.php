@extends('layouts.app')
@section('title','create')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-default">
                  <div class="card-header"><b>Edit Posts</b></div>
                  <div class="card-body">
                     <form action="{{ route('posts.update',$post->id ) }}" method="post">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                             name="title" value="{{ $post->title }}">

                            @error('title')
                            <span class="text-danger small"> {{ $message }} </span>
                            @enderror

                        </div>

                        <div class="form-group">
                          <input type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $post->email }}">

                          @error('email')
                          <span class="text-danger small "> {{ $message }} </span>
                          @enderror

                        </div>

                        <div class="form-grup">
                            <textarea class="form-control mt-3 @error('description') is-invalid @enderror"
                            name="description" cols="5" rows="5">
                                {{ $post->description }}
                            </textarea>

                            @error('description')
                            <span class="text-danger small "> {{ $message }} </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm btn-block shadow mt-3">Update</button>
                        </div>

                     </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
