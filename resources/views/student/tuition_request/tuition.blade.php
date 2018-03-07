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

    <div class="panel-body">
        <div class="row">
        <div class="col-md-6 box">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/tuition/request') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="tuition-label"  style="color: #002a80; font-size: x-large">Tuition info</label>
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
                        <label class="tuition-label" for="place" >Places   :</label>
                        @foreach($tuition_places as $place)
                            <label class="tuition-detail" for="place">{{$place->place}} ,</label>
                            @endforeach
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
                        <label class="tuition-label" for="desc" >Description  :</label>
                        <label class="tuition-detail" for="desc">{{$tuition->description}}</label>
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-6 col-md-offset-3 control-label" style="color: #002a80">Add some message to the teacher</label>

                        <div class="col-md-6 col-md-offset-4">
                            <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" name="requestbutton" value="{{$tuition->id}}">
                            Request this class
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 box">
            <form class="form-horizontal" role="form" method="GET" action="{{ url('/student/teacher/feedback')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <label class="tuition-label"  style="color: #002a80; font-size: x-large">Teacher info</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label class="tuition-label" for="subject">Name    :</label>
                        <label class="tuition-detail" for="subject" >{{$tuition->name}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label class="tuition-label"for="grade" >Address   :</label>
                        <label class="tuition-detail" for="grade" >{{$tuition->address}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label class="tuition-label" for="standard_charge" >Email  :</label>
                        <label class="tuition-detail" for="standard_charge" >{{$tuition->email}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label class="tuition-label" for="standard_charge" >Phone  :</label>
                        <label class="tuition-detail" for="standard_charge" >{{$tuition->phone}}</label>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <label class="tuition-label" for="description" >Description  :</label>
                        <label class="tuition-detail" for="description">{{$tuition->teacher_desc}}</label>
                    </div>
                </div>
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" name="requestbutton" value="{{$tuition->teacher_id}}">
                            View Teacher feedbacks
                        </button>
                    </div>
              </div>
            </form>
        </div>
    </div>

    @endsection