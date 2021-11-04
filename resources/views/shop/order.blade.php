<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/join.css')?>" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/css.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/shopboard.css')?>" >
    
    <title>Hello, world!</title>
    <script src="https://kit.fontawesome.com/db98d81eec.js" 
    crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.8.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/join.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/js.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/cart.js') }}" defer></script>


  </head>
  <body class ="main_body">
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
    <center><h3 class="cart-title"><b>ORDER FAGE</b></h3></center>
    @endforeach

  <div class = carttable>
    
    <table class="table">
      <thead>
        
          <td scope="col" class="orderImg" id="orderImgId">이미지</td>
          <td scope="col">상품명</td>
          <td scope="col">컬러</td>
          <td scope="col">수량</td>
          <td scope="col">판매가</td>
          <td scope="col">합계</td>
        </tr>
      </thead>
      <tbody>
     <?php $price = 0; ?>
        @foreach ($carts as $cart )
       
        <?php 
          $str = $cart->goods_price;
          $num = preg_replace("/[^0-9]*/s", "", $str);
          $totalprice = $num*$cart->number;
          $result = number_format($totalprice);

          $price += $totalprice;
        ?>
        
        
        <tr>
          <td class="orderImg"><img class="cart_img" src="{{URL::asset('/img/'.$cart->mainphoto)}}"></td>
          <td >
            <div class="orderGoodsTitle" onclick="getUrl($(this).text())">
            {{ $cart->goods_title }}        
          </div>
          </td>
          <td class="goodsColor">{{ $cart->color}}</td>
          <td class="goodsnumber">{{ $cart->number}}</td>
          <td class="goodsPrice" >{{ number_format($cart->goods_price)}}원</td>
          <td ><b>{{ $result }}원</b></td>
        </tr>
        @endforeach  
        <input type="hidden" value="{{ $price }}" id="total_price">
        <?php $results = number_format($price)?>
        <tfoot class="oder-total">
          <tr>  
            <td colspan="7">
              <div class="orderTfoot">
                TotalPrice :  <span class="oder-total-price">₩{{ $results }}</span>
              </div>
            </td>
          </tr>
        </tfoot>     
      </tbody>
    </table>
  </div>


<div class="orderInforTablediv">
  <table width="700">
    <tr>
     <th>
       주문 정보
     </th>
    </tr>
    @foreach ($users as $user )
      
    
    <tr>
     <td>  
      <table class="tableborder" cellpadding="8" cellspacing="1">
      <tr>
       <td class="orderInforTableTd">
         주문하시는 분
       </td>
       <td>
         <input type="text" class="orderInforInput" value="{{$user->name}}" id="orderInforName">
       </td>
      </tr>
      <tr>
        <td class="orderInforTableTd">
          휴대전화
        </td>
        <td>
          <input type="text" class="orderInforInput" value="{{$user->tel}}" id="orderInforTel">
        </td>
       </tr>
       <tr>
        <td class="orderInforTableTd">
          주소
        </td>
        <td>
          <div class ="join_addr">
            <input type="text" id="sample6_postcode" placeholder="우편번호" name="post" value="{{$user->post}}" class="orderInforPost">
            <button type="button" class="searchpost" onclick="sample6_execDaumPostcode()">우편번호 검색</button><br>
            <input type="text" id="sample6_address" placeholder="주소" name="addr" value="{{$user->addr}}" class="orderInforAddr"><br>
            <div class="addr_detail">
            <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="detailaddr" value="{{$user->detailaddr}}" class="orderInforDetailaddr">
            <input type="text" id="sample6_extraAddress" placeholder="참고항목">
            </div>
        </td>
       </tr>
       <tr>
        <td class="orderInforTableTd">
          이메일
        </td>
        <td>
          <input type="text" class="orderInforInput" value="{{$user->email}}" id="orderInforEmail">
        </td>
       </tr>
      
      </table>
     </td>
    </tr>
    
    <tr>
     <td>
     </td>
    </tr>
    </table>
  </div>
  @endforeach


  <div class="orderInforTablediv">
    <table width="700">
      <tr>
       <th>
         배송 정보
       </th>
      </tr>
      
      <tr>
       <td>  
        <table class="tableborder" cellpadding="8" cellspacing="1">
          <tr>
            <td class="orderInforTableTd">
              선택
            </td>
            <td>
              <input type="radio" name="chk_info" id="existingInfor"> 주문자 정보와 동일
              <input type="radio" name="chk_info" id="newInfor"> 새로운 배송지
            </td>
           </tr>
        <tr>
         <td class="orderInforTableTd">
           받으시는 분
         </td>
         <td>
           <input type="text" class="orderInforInput" id="ReceiverName">
         </td>
        </tr>
        <tr>
          <td class="orderInforTableTd">
            휴대전화
          </td>
          <td>
            <input type="text" class="orderInforInput" id="ReceiverTel">
          </td>
         </tr>
         <tr>
          <td class="orderInforTableTd">
            주소
          </td>
          <td>
            <div class ="join_addr">
              <input type="text" id="sample6_postcode" placeholder="우편번호" name="post" class="ReceiverPost">
              <button type="button" class="searchpost" onclick="sample6_execDaumPostcode()">우편번호 검색</button><br>
              <input type="text" id="sample6_address" placeholder="주소" name="addr" class="ReceiverAddr"><br>
              <div class="addr_detail">
              <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="detailaddr" class="ReceiverDetailaddr">
              <input type="text" id="sample6_extraAddress" placeholder="참고항목">
              </div>
          </td>
         </tr>
         <tr>
          <td class="orderInforTableTd">
            배송 메모
          </td>
          <td>
            <textarea name="" id="" cols="90" rows="3"></textarea>
          </td>
         </tr>
        
        </table>
       </td>
      </tr>
      
      <tr>
       <td>
       </td>
      </tr>
      </table>
    </div>

  <center><div><button class="paymentbtn"onclick="orderPay()">PAYMENT</button></div></center>



  @foreach ($carts as $cart )
  <input type="hidden" value ="{{ $cart->goods_title }}"name="orderTitle[]">
  <input type="hidden" value ="{{ $cart->mainphoto }}"name="orderPhoto[]">
  <input type="hidden" value ="{{ $cart->color }}"name="orderColor[]">
  <input type="hidden" value ="{{ $cart->number }}"name="orderNumber[]">
  @endforeach

  @foreach ($users as $user )
  <input type="hidden" value="{{ $user->id }}" id="userids">
  <input type="hidden" value="{{ $user->name }}" id="usernames">
  <input type="hidden" value="{{ Auth::user()->id }}" id="useridss">
  @endforeach

  <script type="text/javascript" src="{{ URL::asset('js/join.js') }}" defer></script>
  <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


  </body>
</html>