@extends('welcome')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <br>
                <a href="{{route('student.add')}}" class="btn btn-success">Add Student</a>
                <a href="{{route('student.all')}}" class="btn btn-info">All Student</a>
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
                        <th>Student Name</th>
                        <th>Student Phone</th>
                        <th>Student Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach($student as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                <a href="{{URL::to('student/edit/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{URL::to('student/delete/'.$row->id)}}" class="btn btn-sm btn-danger" >Delete</a>
                                <a href="{{URL::to('student/view/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
