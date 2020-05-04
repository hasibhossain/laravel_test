@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>

                <a href="{{route('post.add')}}" class="btn btn-success">Add Post</a>
                <a href="{{route('post.all')}}" class="btn btn-info">All Post</a>
                <hr>

                <div>
                    <ol>
                        <li>Post Name: {{ $post->name}}</li>
                        <li>Post Title: {{$post->title}}</li>
                        <li>Post Details: {{ $post->details}}</li>
                        <<img src="{{URL::to($post->image)}}" style="height: 340px;">

                    </ol>
                </div>

            </div>
        </div>
    </div>

@endsection
