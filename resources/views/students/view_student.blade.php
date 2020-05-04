@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>

                <a href="{{route('student.add')}}" class="btn btn-success">Add Student</a>
                <a href="{{route('student.all')}}" class="btn btn-info">All Student</a>
                <hr>

                <div>
                    <ol>
                        <li>Category Name: {{ $student->name}}</li>
                        <li>Category Slug: {{$student->email}}</li>
                        <li>Category Slug: {{$student->phone}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

@endsection
