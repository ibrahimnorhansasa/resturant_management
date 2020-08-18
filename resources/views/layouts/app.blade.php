<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap -->
  <!-- Latest compiled and minified CSS -->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('dash/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('dash/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('dash/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('dash/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dash/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dash/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('dash/dist/css/sweetalert2.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    {!!Html::style('css/style.css')!!}
    <style>
        a:focus {
	outline: 0px;
}
        .navbar-default .navbar-nav>li>a {
    color:#eadcdc;
        font-family: sans-serif;
        
}
        .navbar-default .navbar-brand {
    color: black;
    font-family: fantasty;
    font-style: oblique;
    font-size: 24px;
}

.footer_bottom {
	padding: 2em 0;
	background: #d2230e;
}
.copy {
	text-align: center;
}
.copy p {
	font-size: 1em;
	color: #fff;
}
.copy p a {
	color: #fff;
	border-bottom: 1px dotted;
}
.copy p a:hover {
	color: #e5e52d;
	border-bottom: 1px solid;
	text-decoration: none;
}
.about {
	background: #555;
	margin-bottom: 4em;
	background: url(../images/title-bg.jpg) center no-repeat;
	background-size: cover;
	height: 180px;
}
.follow-us {
	margin-top: 10px;
	margin-bottom: 20px;
	text-align: center;
}
.social-icon {
	padding-top: 6px;
	font-size: 16px;
	text-align: center;
	width: 32px;
	height: 32px;
	border: 2px solid #d5f1eb;
	border-radius: 50%;
	color: #d5f1eb;
	margin: 5px;
}
a.social-icon:hover, a.social-icon:active, a.social-icon:focus {
	text-decoration: none;
	color: #e5e52d;
	border-color: #e5e52d;
}
      
       h1{
    font-family: initial;
    color: #962626;
    font-style: oblique;
    font-size: 42px;
       }

    </style>
    </head>
<body id="app"  style="text-align:center;">
<nav class="navbar navbar-default" style="background-color:#bf2715 !important">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Egyption Food</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
   
        <li><a href="/">Home </a></li>
        <li ><a href="#">Blog</a></li>
          @if(Auth::user())
        <li ><a href="/order">Make Order</a></li>
        <li ><a href="/myorder">My Order</a></li>
          @endif
        <li><a href="/contact">Contact</a></li>
  
 
      </ul>
   
      <ul class="nav navbar-nav navbar-right">
     <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@yield('content')
   
    <footer class="ftco-footer ftco-bg-dark ftco-section" style="margin-top:100px;">
  <div class="footer_bottom">
    <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
    <div class="copy text-center">
      <p>Copyright &copy; {{date('Y')}} Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">Norhan Ibrahim</a></p>
    </div>
  </div>
    </footer>
  
<!-- jQuery 3 -->
<script src="{{asset('dash/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('dash/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('dash/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dash/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('dash/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('dash/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('dash/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('dash/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('dash/bower_components/chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dash/dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dash/dist/js/demo.js')}}"></script>
<script src="{{asset('dash/dist/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('js/management.js')}}"></script>
    <script >
        $('.image').change(function(){
           if(this.files && this.files[0]){
               var reader=new FileReader();
               reader.onload=function(e){
                   $('.image-preview').attr('src',e.target.result);
               }
               reader.readAsDataURL(this.files[0]);
           } 
        });
    </script>
    
     @include('partials._message')
     
    @yield('footer')
</body>
</html>