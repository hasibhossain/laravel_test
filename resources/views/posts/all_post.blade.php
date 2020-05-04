@extends('welcome')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>
                <a href="{{route('post.add')}}" class="btn btn-success">Add Post</a>
                <a href="{{route('post.all')}}" class="btn btn-info">All Post</a>
                <br>
                <br>
                <table class="table table-responsive">
                    <tr>
                        <th>Sl</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach($post as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->details}}</td>
                            <td><img src="{{URL::to($row->image)}}" style="height: 40px; width: 70px;"></td>
                            <td>
                                <a href="{{URL::to('post/edit/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{URL::to('post/delete/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                <a href="{{URL::to('post/view/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach

                    {{$post->links()}}
                </table>

            </div>
        </div>
    </div>
@endsection
