@extends('admin.layout.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Teacher Accounts
                    </div>

                    <div class="panel-body">

                        @foreach($teachers as $teacher)
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/teachers/').$teacher->id }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Teacher Name :</label>

                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">{{$teacher->name}}</label>
                                    </div>
                                </div>
                                <div class="form-group" style="color: {{$teacher->status=='active' ? 'green' : 'red'}};">
                                    <label for="name" class="col-md-4 control-label">Status :</label>

                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">{{$teacher->status}}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Email :</label>

                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">{{$teacher->email}}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Address :</label>

                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">{{$teacher->address}}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        @if($teacher->status=='active')
                                            <button type="submit" name="subtmitbutton" value="{{$teacher->id}}" style="background-color: red" class="btn btn-primary">
                                                De-Activate
                                            </button>
                                        @else
                                            <button type="submit" name="subtmitbutton" value="{{$teacher->id}}" style="background-color: green" class="btn btn-primary">
                                                Activate
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        @endforeach

                        @if(sizeof($teachers)==0)
                            <h1 style="color: red;"> There is no feedbacks for this teacher.</h1>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection