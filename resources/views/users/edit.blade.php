@extends('layouts.admin')
@section('header')
    Edit {{$student->first_name}} information
@endsection
@section('content')

    <div class="card">

                <div class="card-body card-block">
            <form action='{{url("/update/user/{$student->id}")}}' method="post" class="">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="first_name" class=" form-control-label">First Name:</label>
                    <input type="text" value="{{$student->first_name}}" id="first_name" name="first_name"  class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" required>
                    {{--<span class="help-block">Please the Registration Number</span>--}}
                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="last_name" class=" form-control-label">Last Name:</label>
                    <input type="text" value="{{$student->last_name}}" id="last_name" name="last_name"  class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" required>
                    {{--<span class="help-block">Please the Registration Number</span>--}}
                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="reg" class=" form-control-label">Registration Number:</label>
                    <input type="text" value="{{$student->reg}}" id="reg" name="reg"  class="form-control{{ $errors->has('reg') ? ' is-invalid' : '' }}" required>
                    {{--<span class="help-block">Please the Registration Number</span>--}}
                    @if ($errors->has('reg'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('reg') }}</strong>
                                    </span>
                    @endif
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>

                </div>
            </form>
        </div>

    </div>

@endsection