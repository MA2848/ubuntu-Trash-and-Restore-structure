@extends('layouts.app')
@section('title','home')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-default">
                <div class="card-header"><b>Posts List</b></div>
                <div class="card-body">

                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    @if ($posts->count())

                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>row</th>
                                <th>title</th>
                                <th>email</th>
                                @if (request()->is('posts'))
                                <th>show</th>
                                @endif

                                <th>
                                    @if (request()->is('posts'))
                                    edit
                                    @else
                                    restore
                                    @endif
                                </th>

                                <th>
                                    @if (request()->is('posts'))
                                    move to trash
                                    @else
                                    delete
                                    @endif

                                </th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($posts as $post )

                                <tr>

                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->email }}</td>

                                    @if (request()->is('posts'))

                                    <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm shadow rounded">show</a>
                                    </td>

                                    @endif
                                    <td>

                                    @if ($post->trashed())
                                    <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-warning btn-sm shadow rounded text-white">restore</a>
                                    @else
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm shadow rounded text-white">edit</a>
                                    @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="post">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm rounded shadow"type="submit">

                                            @if ($post->trashed())
                                            delete
                                            @else
                                            move to trash
                                            @endif

                                        </button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else
                    <div class="alert alert-warning">
                        There is no post to show you
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
