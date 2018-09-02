@extends('layouts.admin')
@section('content')
@section('header')
    Suggestion Feedback
@endsection
   <table class="table table-bordered table-hover">
       <thead>
       <th>No.</th>
       <th>Title</th>
       <th>Description</th>
       <th>Feedback</th>
       </thead>
       <tbody>
       @foreach($suggestions as $suggestion)
           <tr>
               <td>{{$number++}}</td>
               <td>{{$suggestion->title}}</td>
               <td>{{$suggestion->description}}</td>
               <td>{{$suggestion->reply}}</td>
           </tr>
           @endforeach
       </tbody>

   </table>

    @endsection