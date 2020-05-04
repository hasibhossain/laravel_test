@extends('welcome')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>
                <a href="{{route('category.add')}}" class="btn btn-success">Add Category</a>
                <a href="{{route('category.all')}}" class="btn btn-info">All Category</a>
                <br>
                <div>
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif
                </div>
                <br>
                <table class="table table-responsive">
                    <tr>
                        <th>Sl</th>
                        <th>Category Name</th>
                        <th>Slug Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($category as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->slug}}</td>
                            <td>
                                <a href="{{URL::to('category/edit/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{URL::to('category/delete/'.$row->id)}}" class="btn btn-sm btn-danger" >Delete</a>
                                <a href="{{URL::to('category/view/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach
                    {{$category ->links()}}
                </table>
            </div>
        </div>
    </div>
@endsection
