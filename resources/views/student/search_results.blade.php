@extends('student.layout.auth')
<style>
    .tuition-label{
        /*background-color: aliceblue;*/
        /*padding-left:5%;*/
        /*padding-right: 5%;*/
        /*padding-top: 1%;*/
        /*padding-bottom: 1%*/
    }.tuition-detail{
             /*background-color: whitesmoke;*/
             /*padding-left:5%;*/
             /*padding-right: 5%;*/
             /*padding-top: 1%;*/
             /*padding-bottom: 1%*/
         }
    .box{
        /*background-color:#808080;*/
        /*opacity: initial;*/
        border-color: black;
        border-width: thick;
        border-style: dot-dash;
        position: center;
        /*padding-right: 0%;*/
        /*padding-left: 0%;*/
    }
</style>
@section('content')
    @foreach($tuitions as $tuition)
        <div class="panel-body">
            <div class="col-md-6 col-md-offset-4 box">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/tuition/view') }}">
                {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="teacher-name ">Teacher Name  :</label>
                            <label class="tuition-detail" for="teacher-name" >{{$tuition->name}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="subject">Subject    :</label>
                            <label class="tuition-detail" for="subject" >{{$tuition->subject}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label"for="grade" >Grade   :</label>
                            <label class="tuition-detail" for="grade" >{{$tuition->grade}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="place" >Place   :</label>
                            <label class="tuition-detail" for="place">{{$tuition->place}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="standard_charge" >Charge per two hour  :</label>
                            <label class="tuition-detail" for="standard_charge" >{{$tuition->standard_charge}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="per_additional_hour" >Charge per additional hour  :</label>
                            <label class="tuition-detail" for="per_additional_hour">{{$tuition->per_additional_hour}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" name="requestbutton" value="{{$tuition->tuition_id}}">
                                View Class
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    @if(sizeof($tuitions)==0)
        <div class="col-md-6 col-md-offset-4 box">
            <label class="tuition-label" style="font-size: large;padding: 10%; color: red">No results for the query</label>
        </div>
    @endif
    @endsection