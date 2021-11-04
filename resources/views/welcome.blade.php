<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/css.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/shopboard.css')?>" >
    <title>Hello, world!</title>
  </head>
  <body>
    <script src="https://kit.fontawesome.com/db98d81eec.js" 
    crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/js.js') }}" defer></script>


  <header class="header">
    <nav class = "navbar" id="main_navbar">
      <ul class="navbar__logo">
        <a href="/" class="navbar_logo">LalavelStudyShop.JJH</a>
        <div class="nav_menu">
        @foreach ($data as $datas )
        <li><a href="/main/{{ $datas->id }}">{{ $datas->category1_name }}</a></li>
        @endforeach 
        </div>
      </ul>
    
      <ul id ="HeaderIconMenu">

      <li class="mainsearchInputLi">
        <form action="/search" id="searchForm">
        <div class="mainsearchInput">
          <input type="text" style="border:0;" name="search">
          <i class="fas fa-search" id="searchIcon"></i>
        </div>
      </form>
      </li>

        <li id="sidenav"> 
            <a href="#" id="sidenav-toggle"><i class="fas fa-bars"></i></a>
            <nav id="sidenav-menu">
              <header id="sidenav-header">
                <span id="close-sidenav">×</span>
                <div>메뉴</div>
              </header>
                @if(Auth::user())
                @if(Auth::user()->level === 1)
                <ul>
                  <li><a href="/logout">LOGOUT</a></li> 
                  <li><a href="/mypage/{{ Auth::user()->id }}">MYPAGE</a></li> 
                  <li><a href="/orderinfo/{{ Auth::user()->id }}">ORDERS</a></li>
                  <li><a href="/cart/{{ Auth::user()->id }}">CART</a></li>
                  <li><a href="/adminmain">ADMINPAGE</a></li>       
                </ul>
                @else
                <ul>
                  <li><a href="/logout">LOGOUT</a></li>   
                  <li><a href="/mypage/{{ Auth::user()->id }}">MYPAGE</a></li> 
                  <li><a href="/orderinfo/{{ Auth::user()->id }}">ORDERS</a></li>
                  <li><a href="/cart/{{ Auth::user()->id }}">CART</a></li>                     
                </ul>
                @endif
              @else
              <ul>
                <li><a href="/login">LOGIN</a></li> 
                <li><a href="/cart">CART</a></li>                 
              </ul>
            
              @endif
            
            </nav>      
          </li>
      </ul>
   
      <a href="#" class="navbar__togleButton">
        <i class="fas fa-bars"></i>
      </a>
    </nav>
  </header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active"><a href="/">
          <img src="{{URL::asset('/img/1111.JPG')}}" class="d-block w-100" alt="...">
        </a>
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{URL::asset('/img/test2.JPG')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{URL::asset('/img/test.JPG')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>




    <br><br><br>
    <div class="newItems">
    <center><h5 class="list-category-title">NEW ITEMS</h5></center>
    
     <div class="container">
         <div class="row">
           @foreach ($results as $result )    
              <div class="col-md-3">
                <a href="/list/{{ $result->id }}">
                <img class="img" src="{{URL::asset('/img/'.$result->mainphoto)}}">
              </a>
                  <h5 class="list-goods-title"><a href="/list/{{ $result->id }}">{{ $result->goods_title }}</a></h5>
                  <div class="list-goods-price">₩{{ number_format($result->goods_price) }}</div>
              </div>  
             @endforeach
 
         </div>
     </div>
    </div>
    


  
      <script>
          var msg = '{{Session::get('alert')}}';
          var exist = '{{Session::has('alert')}}';
          if(exist){
              alert(msg);
          }
      </script>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>

  
  </body>
</html>