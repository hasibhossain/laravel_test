@extends('welcome')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>
                <a href="{{route('category.add')}}" class="btn btn-success">Add Category</a>
                <a href="{{route('category.all')}}" class="btn btn-info">All Category</a>
                <br>
                <br>
                <div>
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif
                </div>
                <div>
                    @if ($message = Session::get('warning'))

                        <div class="alert alert-warning alert-block">

                            <lebel type="text" data-type="alert">×</lebel>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif
                </div>
                <form action="{{url('category/update/'.$category->id)}}" method="post">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category Name</label>
                            <input type="text" class="form-control" value="{{$category->name}}" name="name" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Slug Name</label>
                            <input type="text" class="form-control" value="{{$category->slug}}" name="slug" required>
                        </div>
                    </div>

                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="sendMessageButton">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
