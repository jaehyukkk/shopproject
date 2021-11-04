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

    @foreach ($users as $user )
    <center><h4 class="cart-title"><b>CART</b></h4></center>
    @endforeach

  <div class = carttable>
    
    <form action="/orders" method="post">
      @csrf
    
    <table class="table">
      <thead>
        <tr >
          <td scope="col"><input type="checkbox" id="allCheck"></td>
          <td scope="col">이미지</td>
          <td scope="col">상품정보</td>
          <td scope="col">수량</td>
          <td scope="col">판매가</td>
          <td scope="col">합계</td>
        </tr>
      </thead>
      <tbody>
        <?php $totalTotalPrice = 0;?>
        @foreach ($carts as $cart )

        <?php 
          $str = $cart->goods_price;
          $totalprice = $str*$cart->number;
          $result = number_format($totalprice);

          $totalTotalPrice += $totalprice;
        ?>
      

        <tr >
          <td scope="row"><input type="checkbox" name="cartcheck[]" value="{{ $cart->carts_id }}"></td>
          <td ><img class="cart_img" src="{{URL::asset('/img/'.$cart->mainphoto)}}"></td>
          <td class="goodsTitleBox">
            <div class="CartGoodsTitle"onclick ="getUrl($(this).text())"><b>{{ $cart->goods_title }}</b></div> 
            <div class="goodsColor">{{ $cart->color}}</div>
          </td>
          <td class="cartCntBox">

            <div class="cartCntdiv">
              <div class="cartCntBoxDiv">
                <input type="text" class ="cartCntBoxInput" value={{ $cart->number }} name ="cntbox[]" data-int='{{ $cart->carts_id }}'>
                <div class ="cartCntBoxIcon">
                <div><a href="#"><i class="fas fa-sort-up fa-xs" id="cartCntBoxUp" data-int='{{ $cart->carts_id }}'></a></i></div>
                <div><a href="#"><i class="fas fa-caret-down fa-xs" id="cartCntBoxDown" data-int='{{ $cart->carts_id }}'></a></i></div>
              </div>
            </div>

              <div>
                <button type="button" class="cartCntBoxChgBtn" data-int='{{ $cart->carts_id }}'>변경</button>
              </div>
            </div>
            </td>
            
          <td class="goodsPrice">{{ number_format($cart->goods_price)}}원</td>
          <td ><b>{{ $result }}원</b></td>
        </tr>
        @endforeach       
      </tbody>
      <?php $total = number_format($totalTotalPrice); ?>
      <tfoot class="oder-total">
        <tr>  
          <td colspan="7">
            <div class="orderTfoot">
              TotalPrice :  <span class="oder-total-price">₩{{ $total }}</span>
            </div>
          </td>
        </tr>
      </tfoot> 
    </table>

    <input type="hidden" value="" name="delete" class="deleteVel">
    <div class="selectDel">
      <button type="submit" class="selectDelBtn">삭제</button>
    </div>
  </div>

  

  
      @foreach ($users as $user )
      <input type="hidden" value="{{ $user->id }}" id="userids" name="userid">
      <input type="hidden" value="{{ Auth::user()->id }}" id="useridss">
      @endforeach

        <div class="oderbtn">
          <button type="submit" class="totalbtn" style="cursor:pointer">전체상품주문</button>
          <button type="submit" class="selectbtn" style="cursor:pointer">선택상품주문</button>
        </div>
  </form>


    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


  </body>
</html>