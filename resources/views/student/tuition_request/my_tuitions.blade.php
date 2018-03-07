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
    @foreach($requests as $request)
        <div class="panel-body">
            <div class="col-md-6 col-md-offset-3 box">
                <form class="form-horizontal" role="form" method="GET" action="{{ url('/student/tuition/feedback') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="teacher-name ">Student  :</label>
                            <label class="tuition-detail" for="teacher-name" >{{$request->name}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="subject">Subject    :</label>
                            <label class="tuition-detail" for="subject" >{{$request->subject}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label"for="grade" >Grade   :</label>
                            <label class="tuition-detail" for="grade" >{{$request->grade}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label"for="grade" >Gener   :</label>
                            <label class="tuition-detail" for="grade" >{{$request->gender}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="standard_charge" >Charge per two hour  :</label>
                            <label class="tuition-detail" for="standard_charge" >{{$request->standard_charge}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="per_additional_hour" >Charge per additional hour  :</label>
                            <label class="tuition-detail" for="per_additional_hour">{{$request->per_additional_hour}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="per_additional_hour" >Charge per additional hour  :</label>
                            <label class="tuition-detail" for="per_additional_hour">{{$request->per_additional_hour}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="per_additional_hour" >Request status  :</label>
                            <label class="tuition-detail" for="per_additional_hour">{{$request->response}}</label>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <label class="tuition-label" for="per_additional_hour" >Message  :</label>
                            <label class="tuition-detail" for="per_additional_hour">{{$request->stu_desc}}</label>
                        </div>
                        <input type="hidden"id="request_id" name="request_id" value="{{$request->request_id}}">
                        @if($request->response == 'accepted')
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="feedbackbutton" value="confirm">
                                    Leave Feedback
                                </button>
                            </div>
                            @else
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="feedbackbutton" value="confirm" disabled>
                                    Leave Feedback
                                </button>
                            </div>
                            @endif
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    @if(sizeof($requests)==0)
        <div class="col-md-6 col-md-offset-4 box">
            <label class="tuition-label" style="font-size: large;padding: 10%; color: red">No more requests</label>
        </div>
    @endif
@endsection