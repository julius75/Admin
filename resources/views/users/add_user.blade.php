
@extends('layouts.admin')
@section('header')
    Add Students
    @endsection
@section('content')
        <div class="row">
            <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <a class="btn btn-primary" href="{{route('import_user')}}" role="button">Upload Users</a>
                </div>
            </div>
        </div>
    </div>
        </div>


<div class="card">
    <div class="card-header">
        <strong>Register Students</strong>
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