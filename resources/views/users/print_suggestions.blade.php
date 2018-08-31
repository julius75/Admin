<!DOCTYPE html>
<html>
<head>
    <h3 style="text-align: center;">Suggestions</h3>
</head>
<body>
<style>
    table th,td{
        border: 1px solid black;
    }
    table{
        border-collapse: collapse;
        width: 100%;
    }
    th{
        height: 50px;
    }
</style>
<table>
    <thead>
    <th>No.</th>
    <th>Title</th>
    <th>Description</th>
    <th>Response</th>
    </thead>
    @foreach($suggestion as $suggestions)
        <tr>
            <td>{{$number++}}</td>
            <td>{{$suggestions->title}}</td>
            <td>{{$suggestions->description}}</td>
            <td>@if($suggestions->reply==null)
            <b>Not yet replied</b>
                    @else
                {{$suggestions->reply}}
                    @endif
            </td>
        </tr>
        @endforeach
</table>
</body>
</html>