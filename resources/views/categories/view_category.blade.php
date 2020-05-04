@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>

                <a href="{{route('category.add')}}" class="btn btn-success">Add Category</a>
                <a href="{{route('category.all')}}" class="btn btn-info">All Category</a>
                <hr>

                <div>
                    <ol>
                        <li>Category Name: {{ $category->name}}</li>
                        <li>Category Slug: {{$category->slug}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

@endsection
