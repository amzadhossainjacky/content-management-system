<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laravel Test </title>
  <!-- Bootstrap core CSS -->
  <link href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <!-- Custom styles for this template -->
  <link href="{{asset('public/frontend/css/clean-blog.css')}}" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}">Laravel Test</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ url('/login') }}">login</a>
                        </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                    @endauth
            @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('public/frontend/img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Content Management System</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

 <div class="container">
     <div class="row">
         <div class="col-lg-8">
             <div> <h3 class="text-info">Section 1</h3></div>
                <div class="row">
                    @if (count($sectionOne) !=0)
                        <div class="col-lg-6">
                            @if ($sectionOne[0]->contentType == "video")
                               <a href="{{route('show.post', $sectionOne[0]->id)}}">
                                    <div>
                                    <iframe class="w-100" style="height: 160px"  controls
                                        src="{{$sectionOne[0]->contentLink}}">
                                    </iframe>
                                    </div>
                                    <p>{{$sectionOne[0]->contentTitle}}</p>
                               </a>
                            @else
                                <a href="{{route('show.post', $sectionOne[0]->id)}}"><img class="w-100" style="height: 160px" src="{{asset($sectionOne[0]->contentLink)}}" alt="">
                                    <p>Title: {{$sectionOne[0]->contentTitle}}</p>
                                </a>
                            @endif
                        </div>
                    @endif

                    @for ($i = 1; $i < count($sectionOne); $i++)

                        @if ($sectionOne[$i]->contentType == "video")
                        <div class="col-lg-3">
                            <a href="{{route('show.post', $sectionOne[$i]->id)}}">
                                <iframe class="w-100" style="height: 122px"
                                src="{{$sectionOne[$i]->contentLink}}">
                                </iframe>
                                <p>Title: {{$sectionOne[$i]->contentTitle}}</p>
                            </a>
                        </div>
                        @else
                        <div class="col-lg-3">
                            <a href="{{route('show.post', $sectionOne[$i]->id)}}"><img class="w-100" style="height: 122px" src="{{asset($sectionOne[$i]->contentLink)}}" alt="">
                                <p>Title: {{$sectionOne[$i]->contentTitle}}</p>
                            </a>
                        </div>
                        @endif
                    @endfor
                </div>
         </div>

         <div class="col-lg-4">
            <div> <h3 class="text-info">Section 2</h3></div>
            <div class="row">
                @if (count($sectionTwo) !=0)
                    <div class="col-lg-12">
                        @if ($sectionTwo[0]->contentType == "video")
                            <a href="{{route('show.post', $sectionTwo[0]->id)}}">
                                <iframe class="w-100"  style="height: 160px" controls
                                src="{{$sectionTwo[0]->contentLink}}">
                                </iframe>
                                <p>Title: {{$sectionTwo[0]->contentTitle}}</p>
                            </a>
                        @else
                            <a href="{{route('show.post', $sectionTwo[0]->id)}}"><img class="w-100" style="height: 160px" src="{{asset($sectionTwo[0]->contentLink)}}" alt="">
                            <p>Title: {{$sectionTwo[0]->contentTitle}}</p>
                            </a>
                        @endif
                    </div>
                @endif

                @for ($i = 1; $i < count($sectionTwo); $i++)

                @if ($sectionTwo[$i]->contentType == "video")
                <div class="col-lg-6">
                    <a href="{{route('show.post', $sectionTwo[$i]->id)}}">
                        <iframe class="w-100" style="height: 122px"   controls
                        src="{{$sectionTwo[$i]->contentLink}}">
                        </iframe>
                        <p>Title: {{$sectionTwo[$i]->contentTitle}}</p>
                    </a>
                </div>
                @else
                <div class="col-lg-6">
                    <a href="{{route('show.post', $sectionTwo[$i]->id)}}"><img class="w-100" style="height: 122px" src="{{asset($sectionTwo[$i]->contentLink)}}" alt="">
                    <p>Title: {{$sectionTwo[$i]->contentTitle}}</p>
                    </a>
                </div>
                @endif
            @endfor
            </div>
         </div>

     </div>
 </div>

  <hr>


  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; coderjack.com 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="{{asset('public/frontend/js/clean-blog.min.js')}}"></script>

  <script>
    @if (Session::has('message'))
      var type="{{Session::get('alert-type','info')}}"
      switch (type) {
          case 'info':
              toastr.info("{{Session::get('message')}}");
              break;
          case 'success':
              toastr.success("{{Session::get('message')}}");
              break;
          case 'warning':
              toastr.warning("{{Session::get('message')}}");
              break;
          case 'error':
              toastr.error("{{Session::get('message')}}");
              break;
      }
    @endif
    </script>
</body>

</html>
