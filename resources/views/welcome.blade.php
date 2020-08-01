<!DOCTYPE html>
<html lang="en">
<head>
  <title>Get Score</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Get GitHub User Score</h2>
  <p><b>Calculation behind this response:</b>
    This input box accepts a GitHub username, and returns that users "Score" based on these rules: PushEvent = 10 points; PullRequestEvent = 5 points; IssueCommentEvent = 4 points; Any other event = 1 point. The information can be retrieved using  GitHub&#39;s
    public api
  </p>
  @if (count($errors) > 0)
   <div class = "alert alert-danger">
    <ul>
        <li>{{ $errors->first() }}</li>
    </ul>
   </div>
@endif
  <form action="{{url('/')}}/senddata" method="post">
    @csrf
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter Github Username" name="username" required>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
           User score is: {{ session()->get('success') }}
        </div>
    @endif
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>
