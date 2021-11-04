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
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/mypage.css')?>" >
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

  
<div id="mypageTitle">
    <center><p>MYPAGE</p></center>
</div>

<div id="mypage">
<div id="mypageMainBox">
    <div id="mypageOrderTitle">
        나의 주문처리 현황
    </div>
    <div id="mypageMainBoxDesc">
        <div class="mypageMainBoxDesc-div">
            <div class="mypageMainBoxTitle">
                장바구니
            </div>
            <div class="mypageMainBoxDesc">
                {{ $cart }}
            </div>
        </div>
        <div class="mypageMainBoxDesc-div">
            <div class="mypageMainBoxTitle">
                배송준비중
            </div>
            <div class="mypageMainBoxDesc">
                {{ $ready }}
            </div>
        </div>
        <div class="mypageMainBoxDesc-div">
            <div class="mypageMainBoxTitle">
                배송중
            </div>
            <div class="mypageMainBoxDesc">
                {{ $middel }}
            </div>
        </div>
        <div class="mypageMainBoxDesc-div">
            <div class="mypageMainBoxTitle">
                배송완료
            </div>
            <div class="mypageMainBoxDesc">
                {{ $success }}
            </div>
        </div>
    </div>  
</div>
</div>

<div id="mypageMenuBox">
    <div class="mypageMenuBoxTitle">
      <a href="/cart/{{ Auth::user()->id }}">
        <div class="mypageMenuBoxTitle-title">
            <i class="fas fa-shopping-cart"></i> CART
        </div>
      </a>
    </div>
    <div class="mypageMenuBoxTitle">
      <a href="/orderinfo/{{ Auth::user()->id }}">
        <div class="mypageMenuBoxTitle-title">
            <i class="fas fa-shopping-cart"></i> ORDER
        </div>
      </a>
    </div>
    <div class="mypageMenuBoxTitle">
      <a href="/resetinfo/{{ Auth::user()->id }}">
        <div class="mypageMenuBoxTitle-title">
            <i class="fas fa-user"></i> EDIT PROFILE
        </div>
      </a>
    </div>
    <div class="mypageMenuBoxTitle">
      <a href="/resetpassword">
        <div class="mypageMenuBoxTitle-title">
            <i class="fas fa-unlock"></i> RESET PASSWORD
        </div>
      </a>
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