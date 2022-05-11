@extends('layouts.app')
@section('title','show posts')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="crad card-default bg-white">
                    <div class="card-header"><b>Show Post</b></div>
                    <div class="card-body ">

                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $post->title }}" disabled>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $post->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <textarea name="description" class="form-control"  cols="5" rows="5" disabled>
                                {{ $post->description }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
