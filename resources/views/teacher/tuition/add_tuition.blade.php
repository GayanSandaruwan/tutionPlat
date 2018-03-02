@extends('teacher.layout.auth')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Adding a New Class..
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/tuition/new') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Subject</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" autofocus>

                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('places') ? ' has-error' : '' }}">
                            <label for="places" class="col-md-4 control-label">Places</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('places'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('places') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="nic" class="col-md-4 control-label">Brief description of yours</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">
                                {{ old('description') }}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('standard_charge') ? ' has-error' : '' }}">
                            <label for="nic" class="col-md-4 control-label">Charge per Visit (2 hours)</label>

                            <div class="col-md-6">
                                <input id="standard_charge" type="number" class="form-control" name="standard_charge" value="{{ old('phone') }}">

                                @if ($errors->has('standard_charge'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('standard_charge') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('per_additional_hour') ? ' has-error' : '' }}">
                            <label for="nic" class="col-md-4 control-label">Chage per additional hour</label>

                            <div class="col-md-6">
                                <input id="per_additional_hour" type="number" class="form-control" name="per_additional_hour" value="{{ old('per_additional_hour') }}">

                                @if ($errors->has('per_additional_hour'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('per_additional_hour') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Add Class
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection