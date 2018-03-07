@extends('student.layout.auth')

<style>
    .star-rating {
        line-height:32px;
        font-size:1.25em;
    }
    .y{color: yellow;}
    .o{color: #8c8c8c;}
</style>
@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Feedback form
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/tuition/feedback') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                                    <div class="col-lg-12">

                                    <label for="password-confirm" class="col-md-4 control-label">Rating</label>
                                            <div class="star-rating">
                                                <span class="fa fa-star o" data-rating="1"></span>
                                                <span class="fa fa-star o" data-rating="2"></span>
                                                <span class="fa fa-star o" data-rating="3"></span>
                                                <span class="fa fa-star o" data-rating="4"></span>
                                                <span class="fa fa-star o" data-rating="5"></span>
                                                <input type="hidden" name="rating" class="rating-value" value="2.56">
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('feedback') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <textarea id="feedback" type="text" class="form-control" name="feedback">
                                            {{old('feedback')}}
                                        </textarea>
                                        @if ($errors->has('feedback'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('feedback') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <input type="hidden" name="tuition_id" id="tuition_id" value="{{$tuition_id}}"/>
                                        <button type="submit" name='submitbutton' value="{{true}}" class="btn btn-primary">
                                            Submit
                                        </button>
                                        <button type="submit" name="submitbutton" value="{{false}}" class="btn btn-primary">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var $star_rating = $('.star-rating .fa');

            var SetRatingStar = function() {
                return $star_rating.each(function() {
                    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                        return $(this).removeClass('fa-star o').addClass('fa-star y');
                    } else {
                        return $(this).removeClass('fa-star y').addClass('fa-star o');
                    }
                });
            };

            $star_rating.on('click', function() {
                $star_rating.siblings('input.rating-value').val($(this).data('rating'));
                return SetRatingStar();
            });

            SetRatingStar();
            $(document).ready(function() {

            });
        </script>
    @endsection