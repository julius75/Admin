
@extends('layouts.admin')
@section('header')
    Add Students
    @endsection
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Fill All</strong> Fields
    </div>
    <div class="card-body card-block">
        <form action="{{route('store')}}" method="post" class="">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="reg" class=" form-control-label">Registration Number:</label>
                <input type="text" id="reg" name="reg"  class="form-control{{ $errors->has('reg') ? ' is-invalid' : '' }}" required>
                {{--<span class="help-block">Please the Registration Number</span>--}}
                @if ($errors->has('reg'))
                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('reg') }}</strong>
                                    </span>
                @endif
            </div>

            {{--<div class="form-group">--}}
                {{--<label for="password" class=" form-control-label">Password:</label>--}}
                {{--<input type="password" id="password" name="password" class="form-control" required>--}}
                {{--<span class="help-block">Please the password</span>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label for="confirm" class=" form-control-label">Password Confirmation:</label>--}}
                {{--<input type="password" id="confirm" name="confirm"  class="form-control" required>--}}
                {{--<span class="help-block">Please the password</span>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<button for="button" class=" btn-danger">Submit:</button>--}}
                {{--<input type="submit" id="confirm" name="submit"  class="form-control">--}}
                {{--<span class="help-block">Please the password</span>--}}
            {{--</div>--}}

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-lg>
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </form>
    </div>

</div>
    @endsection