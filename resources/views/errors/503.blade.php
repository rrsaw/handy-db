<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Handy</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

</head>

<body id="error_body">

<div class="container error_log">
  <div class="col-lg-8 col-lg-offset-2 text-center">
    <div class="row">
      <div class="col-lg-4 text-right">
        <p id="container_error_title">503</p>
      </div>
      <div class="col-lg-8 text-left">
        <p id="container_error_desc">Service unavailable<br>Not available right now, try later</p>
        <a href"http://handyshare.me" id="container_error_home"> << Back  </a>
      </div>

      </div>
    </div>

  </div>

</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/landing_script.js')}}">

  </script>
</body>

</html>
