<!DOCTYPE html>
<html>
<head>
    <title>Suggestion Feedback Email</title>
</head>

<body>
<h2 style="text-decoration: underline;">Online Suggestion Box.</h2>
<br/>
<b>Your suggestion:</b></br><br>
<b>Title:</b>{{$suggestions->title}}<br><br><br>
<b>Description:</b> {{$suggestions->description}}<br><br><br>
<b>Feedback:</b>{{$suggestions->reply}}<br>
<br><br>

<p>Thanks for your suggestion.</p>
</body>

</html>