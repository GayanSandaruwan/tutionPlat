@extends('student.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as Student!
                </div>
                <div class="row">
                    {{Auth::user()->subject}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
