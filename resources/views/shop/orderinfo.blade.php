<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/css.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/shopboard.css')?>" >
    <title>Hello, world!</title>
    <script src="https://kit.fontawesome.com/db98d81eec.js" 
    crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/js.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/cart.js') }}" defer></script>


  </head>
  <body>
    {{-- defer --}}

    <script>
      var msg = '{{Session::get('alert')}}';
      var exist = '{{Session::has('alert')}}';
      if(exist){
          alert(msg);
      }
  </script>

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



    <center><h4 class="cart-title"><b>ORDERS</b></h4></center>

  <div class = carttable>
    <table class="table">
      <thead>
        <tr >
          <td scope="col">주문번호</td>
          <td scope="col">이미지</td>
          <td scope="col">상품 이름</td>
          <td scope="col">컬러</td>
          <td scope="col">수량</td>
          <td scope="col">배송상태</td>
        </tr>
      </thead>
      <tbody>
        <?php $totalTotalPrice = 0;?>
        @foreach ($orders as $order )
        <?php 
        $totalTotalPrice += $order->amount;
        ;
         ?>
        <?php $getOrderList = json_decode($order->orderlist)?>
        @for($i = 0 ; $i < count($getOrderList); $i++)

      
      
        <tr>
          <td scope="row">{{ $order->uid }}</td>
          <td><img class="cart_img" src="{{URL::asset('/img/'.$getOrderList[$i]->photo)}}"></td>
          <td><div class="CartGoodsTitle" onclick ="getUrl($(this).text())">{{ $getOrderList[$i]->title }}</div></td>
          <td>{{ $getOrderList[$i]->color }}</td>       
          <td>{{ $getOrderList[$i]->number }}</td>
          <td>{{ $order->orderstate }}</td>
        </tr>
        @endfor
        @endforeach       
      </tbody>
      <tfoot class="oder-total">
        <tr>  
          <td colspan="7">
            <div class="orderTfoot">
                <?php $result = number_format($totalTotalPrice) ?>
              TotalPrice :  <span class="oder-total-price">₩{{ $result }}</span>
            </div>
          </td>
        </tr>
      </tfoot> 
    </table>




    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


  </body>
</html>