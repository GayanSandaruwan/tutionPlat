@extends('admin.layout.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Student Accounts
                    </div>

                    <div class="panel-body">

                            @foreach($students as $student)
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/students/').$student->id }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Student Name :</label>

                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">{{$student->name}}</label>
                                    </div>
                                </div>
                                <div class="form-group" style="color: {{$student->status=='active' ? 'green' : 'red'}};">
                                    <label for="name" class="col-md-4 control-label">Status :</label>

                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">{{$student->status}}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Email :</label>

                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">{{$student->email}}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Address :</label>

                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">{{$student->address}}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        @if($student->status=='active')
                                            <button type="submit" name="subtmitbutton" value="{{$student->id}}" style="background-color: red" class="btn btn-primary">
                                                De-Activate
                                            </button>
                                        @else
                                            <button type="submit" name="subtmitbutton" value="{{$student->id}}" style="background-color: green" class="btn btn-primary">
                                                Activate
                                            </button>
                                            @endif
                                    </div>
                                </div>
                            </form>
                                @endforeach

                            @if(sizeof($students)==0)
                                <h1 style="color: red;"> There is no feedbacks for this teacher.</h1>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection