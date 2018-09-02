@extends('layouts.admin')
@section('header')
    All Suggestions: <a href="{{route('print_suggestion')}}" class="btn btn-danger float-right">Print Suggestions</a>
@endsection
@section('content')
    <style>
.card .response{
    display: none;
}
    </style>
    <div class="card col-md-12">

        <div class="card-body card-block">
            @foreach($suggestion as $suggestions)
                <h6>{{$number++}}.<b style="text-decoration: underline;">{{$suggestions->title}}</b></h6>
                <p>{{$suggestions->description}}</p>
                @if($sugg=\App\Suggestion::where('id',$suggestions->id)->first())
                    @if($sugg->reply!=null)
                        <button href="" class="btn btn-secondary btn-sm" id="1" name="view_reply" disabled>Replied</button>
                        @else
                        <button id="reply{{$suggestions->id}}" class="btn btn-primary btn-sm">Reply</button>
                    @endif
                @else

                    @endif
                    <br>
            <form class="form-group response" method="post" action={{url("/send-reply/{$suggestions->id}")}} id="{{$suggestions->id}}">
                {{csrf_field()}}
            <textarea placeholder="Enter Reply" name="reply" id="text" required cols="3" rows="3" class="form-control{{ $errors->has('reply') ? ' is-invalid' : '' }} col-md-12" style="border: 1px solid red;border-radius: 5px"></textarea>
                @if ($errors->has('reply'))
                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('reply') }}</strong>
                                    </span>
                @endif
           <br>
                <input type="submit" value="Reply" id="response{{$suggestions->id}}" class="btn btn-success">
            </form>
                <hr>

                <script>
                    $(document).ready(function () {
                        $("#reply{{$suggestions->id}}").click(function () {
                            $("#{{$suggestions->id}}").show(3000);
                            $("#reply{{$suggestions->id}}").hide(3000);
                        });
                        $("#response{{$suggestions->id}}").click(function () {
                            $("#{{$suggestions->id}}").hide(3000);
                            $("#reply{{$suggestions->id}}").show(3000);
                        })

                    })
                </script>
                <script>
                    $(document).ready(function () {
                        $('link-href[name="view_reply"]').click(function () {
                           $.ajax({
                               method: 'GET',
                               url: '/get_reply/'+id
                           })
                        })
                    })
                </script>
                @endforeach
            {{$suggestion->links()}}
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