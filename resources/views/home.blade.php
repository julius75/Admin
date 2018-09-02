@extends('layouts.admin')
@section('header')
    <h3>Welcome {{Auth::user()->name}}</h3>
    @endsection
@section('content')
    <br>
    <hr>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-3 divs">
            <div class="statistic__item">
                <h2 class="number">{{$users}}</h2>
                <span class="desc">Users/Students</span>
                <div class="icon">
                    <i class="zmdi zmdi-account-o"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 divs">
            <div class="statistic__item">
                <h2 class="number">{{$suggestions}}</h2>
                <span class="desc">Suggestions Received</span>
                <div class="icon">
                    <i class="zmdi zmdi-account-o"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 divs">
            <div class="statistic__item">
                <h2 class="number">{{$feedback}}</h2>
                <span class="desc">Feedbacks Sent</span>
                <div class="icon">
                    <i class="zmdi zmdi-account-o"></i>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection