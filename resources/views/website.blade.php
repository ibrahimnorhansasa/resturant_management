<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- 
    More Templates Visit ==> Free-Template.co
    -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free Template by Free-Template.co" />
    <meta name="keywords" content="free bootstrap 4, free bootstrap 4 template, free website templates, free html5, free template, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="Free-Template.co" />
      <link rel="stylesheet" href="{{asset('dash/dist/css/sweetalert2.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
      {!!Html::style('website/css/bootstrap.min.css')!!}
      {!!Html::style('website/css/open-iconic-bootstrap.min.css')!!}
           {!!Html::style('website/css/animate.css')!!}
           {!!Html::style('website/css/owl.carousel.min.css')!!}
           {!!Html::style('website/css/owl.theme.default.min.css')!!}
           {!!Html::style('website/css/magnific-popup.css')!!}
           {!!Html::style('website/css/bootstrap-datepicker.css')!!}
           {!!Html::style('website/css/jquery.timepicker.css')!!}
           {!!Html::style('website/css/icomoon.css')!!}
        {!!Html::style('website/css/style.css')!!}

   
      
  </head>

 <body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">Egyption Food</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="#section-home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#section-about" class="nav-link">About</a></li>
            <li class="nav-item"><a href="#section-offer" class="nav-link">Meals</a></li>
            <li class="nav-item"><a href="#section-menu" class="nav-link">Menu</a></li>
            
            <li class="nav-item"><a href="#section-gallery" class="nav-link">Gallery</a></li>
            <li class="nav-item"><a href="#section-contact" class="nav-link">Contact</a></li>
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
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section class="ftco-cover" style="background-image: url(website/images/bg_3.jpg);" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
          <div class="col-md-12">
            <h1 class="ftco-heading ftco-animate mb-3">Welcome To Egyption Food Restaurant</h1>
             
            <p><a  class="btn btn-outline-white btn-lg ftco-animate"href="{{url('/order')}}">Make Order</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    
    <section class="ftco-section" id="section-about">
      <div class="container">
        <div class="row">
          <div class="col-md-5 ftco-animate mb-5">
            <h4 class="ftco-sub-title">Our Story</h4>
            <h2 class="ftco-primary-title display-4">Welcome</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

            <p class="hide-more">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <button class="btn btn-success btn-lg more-btn"> ReadMore</button>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate img" data-animate-effect="fadeInRight">
            <img src="website/images/about.jpg" alt="Free Template by Free-Template.co">
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    

    <section class="ftco-section bg-light" id="section-offer">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12 text-center mb-5 ftco-animate">
            <h2 class="display-4">Our Meals</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel ftco-owl">
                @foreach($meals as $meal)
              <div class="item">
                <div class="media d-block mb-4 text-center ftco-media ftco-animate border-0">
                  <img src="{{asset('/images/'.$meal->image)}}" alt="Free Template by Free-Template.co" class="img-fluid">
                  <div class="media-body p-md-5 p-4">
                    <h5 class="text-primary">{{$meal->price}}</h5>
                    <h5 class="mt-0 h4">{{$meal->title}}</h5>
                    <p class="mb-4">{{$meal->description}}</p>

                    <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Order Now!</a></p>
                  </div>
                </div>
              </div>
@endforeach

            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="ftco-section" id="section-menu">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center mb-5 ftco-animate">
            <h2 class="display-4">Today's Menu</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </div>

          <div class="col-md-12 text-center">

            <ul class="nav ftco-tab-nav nav-pills mb-5" id="pills-tab" role="tablist">
              <li class="nav-item ftco-animate">
                <a class="nav-link active" id="pills-food-tab" data-toggle="pill" href="#pills-food" role="tab" aria-controls="pills-food" aria-selected="true">Food</a>
              </li>
              <li class="nav-item ftco-animate">
                <a class="nav-link" id="pills-sweet-tab" data-toggle="pill" href="#pills-sweet" role="tab" aria-controls="pills-sweet" aria-selected="false">Sweet</a>
              </li>
              <li class="nav-item ftco-animate">
                <a class="nav-link" id="pills-drink-tab" data-toggle="pill" href="#pills-drink" role="tab" aria-controls="pills-drink" aria-selected="false">Drink</a>
              </li>
            </ul>

            <div class="tab-content text-left">
              <div class="tab-pane fade show active" id="pills-food" role="tabpanel" aria-labelledby="pills-food-tab">
                <div class="row">
                     @foreach($foods as $food)
                  <div class="col-md-6 ftco-animate">
                    <div class="media menu-item">
                     
                      <img class="mr-3" src="{{asset('/images/'.$food->image)}}" class="img-fluid" alt="Free Template by Free-Template.co">
                      <div class="media-body">
                       <a href="{{url('/showMenu/'.$food->id)}}"><h5 style="font-family:inherit;" class="mt-0">{{$food->title}}</h5></a> 
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      </div>
                    </div>

                
              
                  </div>
                     @endforeach  
                </div>
              </div>
              <div class="tab-pane fade" id="pills-sweet" role="tabpanel" aria-labelledby="pills-sweet-tab">
                
                <div class="row">
                      @foreach($sweets as $sweet )
                  <div class="col-md-6 ftco-animate">

                    <div class="media menu-item">
                      <img class="mr-3" src="{{asset('/images/'.$sweet->image)}}" class="img-fluid" alt="Free Template by Free-Template.co">
                      <div class="media-body">
                       <a href="{{url('/showMenu/'.$sweet->id)}}"><h5 style="font-family:inherit;" class="mt-0">{{$sweet->title}}</h5></a> 
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      </div>
                      </div>
              
                  </div>
                    @endforeach
                </div>
              </div>
              <div class="tab-pane fade" id="pills-drink" role="tabpanel" aria-labelledby="pills-drink-tab">
                <div class="row">
                    @foreach($drinks as $drink)
                  <div class="col-md-6 ftco-animate">
                    <div class="media menu-item">
                      <img class="mr-3" src="website/images/menu_1.jpg" class="img-fluid" alt="Free Template by Free-Template.co">
                      <div class="media-body">
                          <a href="{{url('/showMenu/'.$drink->id)}}"> <h5 class="mt-0" style="font-family:inherit;">{{$drink->title}}</h5></a>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      </div>
                    </div>

                    
                  </div>
                    @endforeach
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


    <section class="ftco-section" id="section-gallery">
      <div class="container">
        <div class="row ftco-custom-gutters">

          <div class="col-md-12 text-center mb-5 ftco-animate">
            <h2 class="display-4">Food Gallery</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
            <a href="images/menu_1.jpg" class="ftco-thumbnail image-popup">
              <img src="{{asset('website/images/menu_1.jpg')}}" alt="Free Template by Free-Template.co" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4 ftco-animate">
            <a href="images/menu_2.jpg" class="ftco-thumbnail image-popup">
              <img src="{{asset('website/images/menu_2.jpg')}}" alt="Free Template by Free-Template.co" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4 ftco-animate">
            <a href="images/menu_3.jpg" class="ftco-thumbnail image-popup">
              <img src="{{asset('website/images/menu_3.jpg')}}" alt="Free Template by Free-Template.co" class="img-fluid">
            </a>
          </div>

          <div class="col-md-4 ftco-animate">
            <a href="images/menu_2.jpg" class="ftco-thumbnail image-popup">
              <img src="{{asset('website/images/menu_2.jpg')}}" alt="Free Template by Free-Template.co" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4 ftco-animate">
            <a href="images/menu_3.jpg" class="ftco-thumbnail image-popup">
              <img src="{{asset('website/images/menu_3.jpg')}}" alt="Free Template by Free-Template.co" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4 ftco-animate">
            <a href="images/menu_1.jpg" class="ftco-thumbnail image-popup">
              <img src="{{asset('website/images/menu_1.jpg')}}" alt="Free Template by Free-Template.co" class="img-fluid">
            </a>
          </div>

        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="ftco-section bg-light" id="section-contact">
      <div class="container">
        <div class="row">

          <div class="col-md-12 text-center mb-5 ftco-animate">
            <h2 class="display-4">Contact Us</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-5 ftco-animate">
                {!!Form::open(['action'=>'WebsiteController@sendMail','method'=>'POST'])!!}
              <div class="form-group">
                <label for="name" class="sr-only">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
              </div>
              <div class="form-group">
                <label for="message" class="sr-only">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control"  placeholder="Write your message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" value="Send Message">
              </div>
         {!!Form::close()!!}
          </div>
          
        </div>
      </div>
    </section>
    <div id="map"></div>
    <!-- END section -->
    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md ftco-animate">
                <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">The Restaurant</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">About Us</a></li>
                    <li><a href="#" class="py-2 d-block">Chefs</a></li>
                    <li><a href="#" class="py-2 d-block">Events</a></li>
                    <li><a href="#" class="py-2 d-block">Contact</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md ftco-animate">
                 <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Communities</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Support</a></li>
                    <li><a href="#" class="py-2 d-block">Sharing is Caring</a></li>
                    <li><a href="#" class="py-2 d-block">Better Web</a></li>
                    <li><a href="#" class="py-2 d-block">Good Template</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md ftco-animate">
                 <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Useful links</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Bootstrap 4</a></li>
                    <li><a href="#" class="py-2 d-block">jQuery</a></li>
                    <li><a href="#" class="py-2 d-block">HTML5</a></li>
                    <li><a href="#" class="py-2 d-block">Sass</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <ul class="ftco-footer-social list-unstyled float-md-right float-lft">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md text-left">
            <p>&copy; Taste 2018. All Rights Reserved.  Made with <span class="icon-heart text-danger"></span>  by <a href="https://free-template.co/">Free-Template.co</a></p>
          </div>
        </div>
      </div>
    </footer>

    
    
 @include('partials._error')


    <!-- END Modal -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="{{asset('website/js/jquery.min.js')}}"></script>
    <script src="{{asset('website/js/popper.min.js')}}"></script>
    <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('website/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('website/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('website/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('website/js/jquery.timepicker.min.js')}}"></script>
    
    <script src="{{asset('website/js/jquery.animateNumber.min.js')}}"></script>
    

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>

    <script src="{{asset('website/js/main.js')}}"></script>
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
</body>
</html>
