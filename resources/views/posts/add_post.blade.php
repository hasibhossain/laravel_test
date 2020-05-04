@extends('welcome')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>
                <a href="" class="btn btn-success">Add Post</a>
                <a href="{{route('post.all')}}" class="btn btn-info">All Post</a>
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
                <form action="{{route('post.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Post Title</label>
                            <input type="text" class="form-control" placeholder="title" name="title" required="required">
                        </div>
                    </div>
                    <br>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($category as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Post Image</label>
                            <input type="file" class="form-control" required="required" name="image">
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Post Details</label>
                            <textarea rows="4" class="form-control" placeholder="details" required="required" name="details"></textarea>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="sendMessageButton">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
