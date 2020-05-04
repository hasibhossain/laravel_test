@extends('welcome')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>
                <a href="#" class="btn btn-success">Add Category</a>
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
                <form action="{{route('category.save')}}" method="post">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category Name</label>
                            <input type="text" class="form-control" placeholder="category" name="name" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Slug Name</label>
                            <input type="text" class="form-control" placeholder="slug" name="slug" required>
                        </div>
                    </div>

                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="sendMessageButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
