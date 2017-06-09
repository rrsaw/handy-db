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

<body id="landing_body">
  <nav class="navbar navbar-default navbar-static-top navbar_container">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        <a href=""><img src="{{ asset('images/landing/logo.png')}}" alt="" id="logo"></a>
        <a class="navbar-brand" href="#" id="logo_text">Handy</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#enjoy_img">About</a></li>
          <li><a href="#title_browser">How it works</a></li>
          <li><a href="#sb_1">Service</a></li>
          <li><a href="#footer_one">Contacts</a></li>
          <li><a href="{{ url('/login') }}" id="login">Login</a></li>
          <li><a href="{{ url('/registration') }}">Register</a></li>

        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <div>
    <img src="{{ asset('images/landing/start.jpg')}}" id="img_background" class="img_background_anim">
  </div>
  <div class="container">

    <div class="col-md-6 col-md-offset-3 text-center" id="top_title_container">
      <p id="title">Enjoy <b>sharing</b> and <b>meeting</b> people</p>
    </div>

    <div class="col-md-12">
      <div class="medium_box ">
        <div class="col-md-6 col-md-offset-3">
          <img src="{{asset('images/landing/enjoy.png')}}" alt="" class="img-responsive" id="enjoy_img">
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-center">
            <p id="enjoy_text">What is your attitude as a small town businessman when it comes to advertising or taking help of an advertising design agency to provide creative design solutions?</p>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="big_box">
        <div class="col-md-10 col-md-offset-1 text-center">
          <div class="row">
            <p id="title_browser">how does this work?</p>
          </div>
          <div class="row">
            <p id="desc_browser">login now to start your sharing experience</p>
          </div>
          <div class="row">
            <img src="{{asset('images/landing/browser.png')}}" alt="" id="browser_img" class="img-responsive search">
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-sm-6 col-xs-12 pull-left">
      <div id="sb_1" class="sb_anim">
        <div class="col-md-12 text-center" id="search_box">
          <div class="row sb_title_container">
            <p id="title_search">Download our app</p>
          </div>
          <div class="row">
            <p id="desc_search">iOS and Android</p>
          </div>
          <div class="col-md-12 text-center">
            <div class="row">
              <img src="{{asset('images/landing/search.png')}}" alt="" class="img-responsive" id="search_img">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div id="sb_2" class="sb_anim">
        <div class="col-md-12 text-center" id="search_box">
          <div class="row sb_title_container">
            <p id="title_search">Everywhere and always</p>
          </div>
          <div class="row">
            <p id="desc_search">You can reach us anytime</p>
          </div>
          <div class="col-md-12 text-center">
            <div class="row">
              <img src="{{asset('images/landing/watch.png')}}" alt="" class="img-responsive" id="search_img">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="medium_box_2">
        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-sm-12" id="title_box">
          <div class="row">
            <div>
              <p id="title">More than 2000 Items for you to borrow</p>
            </div>
          </div>
          <div class="row register_box">
            <div>
              <a href="#">
                <p>Click here to register</p>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-md-offset-2 iphone_container">
          <img src="{{asset('images/landing/iphone.png')}}" alt="" id="iphone_img" class="img-responsive iphone">
        </div>
      </div>
    </div>

    <div class="col-md-12 text-center">
      <img src="{{asset('images/landing/share2.png')}}" alt="" id="share_img">
    </div>


  </div>

  <div class="container-fluid" id="footer_fluid">
    <div id="footer_one" class="row">
      <div class="col-md-6 col-md-offset-3 col-sm-12  text-center footer_link text-center">
        <div class="row">
          <a href="#enjoy_img">
            <p>About</p>
          </a>
          <a href="#title_browser">
            <p>How it works</p>
          </a>
          <a href="#sb_1">
            <p>Service</p>
          </a>
          <a href="#footer_two">
            <p>Contacts</p>
          </a>
        </div>
      </div>
    </div>


    <div id="footer_two" class="row">
      <div class="col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 text-center">
        <div class="row title">
          <p>MAIL</p>
        </div>
        <div class="row">
          <p>info@handyshare.me</p>
        </div>
      </div>

      <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 text-center">
        <div class="row title">
          <p>PHONES</p>
        </div>
        <div class="row">
          <p>T. 166-124-3965 — F. 523-795-6115</p>
        </div>
      </div>

      <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 text-center">
        <div class="row title">
          <p>SOCIAL</p>
        </div>
        <div class="row social_container">
          <a href="#">Youtube</a>
          <p> / </p><a href="#">Instagram</a>
          <p> / </p><a href="#">LinkedIn</a>
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
