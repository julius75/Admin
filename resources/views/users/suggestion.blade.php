@extends('layouts.admin')
@section('header')
    All Suggestions:
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Normal</strong> Form
        </div>
        <div class="card-body card-block">

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </div>
@endsection