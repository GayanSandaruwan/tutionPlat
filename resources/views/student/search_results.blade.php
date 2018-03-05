@extends('student.layout.auth')

@section('content')

    @foreach($tuitions as $tuition)
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/register') }}">
                {{ csrf_field() }}
                <div class="form-group">

                    <div class="col-md-6 col-md-offset-4">
                        <label for="teacher-name" style="background-color: blue; padding-left:5%; padding-right: 5%; padding-top: 1%; padding-bottom: 1%">Teacher Name</label>
                        <label for="teacher-name" style="background-color: whitesmoke; padding-left: 5%;padding-right: 5% ;padding-top: 1%; padding-bottom: 1%">{{$tuition->name}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label for="subject" style="background-color: blue; padding-left:5%; padding-right: 5%; padding-top: 1%; padding-bottom: 1%">subject</label>
                        <label for="subject" style="background-color: whitesmoke; padding-left: 5%;padding-right: 5% ;padding-top: 1%; padding-bottom: 1%">{{$tuition->subject}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label for="grade" style="background-color: blue; padding-left:5%; padding-right: 5%; padding-top: 1%; padding-bottom: 1%">grade</label>
                        <label for="grade" style="background-color: whitesmoke; padding-left: 5%;padding-right: 5% ;padding-top: 1%; padding-bottom: 1%">{{$tuition->grade}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label for="place" style="background-color: blue; padding-left:5%; padding-right: 5%; padding-top: 1%; padding-bottom: 1%">place</label>
                        <label for="place" style="background-color: whitesmoke; padding-left: 5%;padding-right: 5% ;padding-top: 1%; padding-bottom: 1%">{{$tuition->place}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label for="standard_charge" style="background-color: blue; padding-left:5%; padding-right: 5%; padding-top: 1%; padding-bottom: 1%">Charge per two hour</label>
                        <label for="standard_charge" style="background-color: whitesmoke; padding-left: 5%;padding-right: 5% ;padding-top: 1%; padding-bottom: 1%">{{$tuition->standard_charge}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label for="per_additional_hour" style="background-color: blue; padding-left:5%; padding-right: 5%; padding-top: 1%; padding-bottom: 1%">Charge per additional hour</label>
                        <label for="per_additional_hour" style="background-color: whitesmoke; padding-left: 5%;padding-right: 5% ;padding-top: 1%; padding-bottom: 1%">{{$tuition->per_additional_hour}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" name="requestbutton" value="{{$tuition->id}}">
                            View Class
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
    @endsection