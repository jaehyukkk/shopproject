<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/css.css')?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/shopboard.css')?>" >
    <script src="https://kit.fontawesome.com/db98d81eec.js" 
    crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ URL::asset('/ckeditor_review/ckeditor/ckeditor.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('/ckeditor_review/ckeditor/adapters/jquery.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/js.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/reviewUpdate.js') }}" defer></script>

   

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
  
  @foreach ($goodss as $goods )
  <article class = "list-main-box">
      <div class="list-main-photo-box">
        <?php $result = json_decode($goods->contentphoto); ?>
        @for($i = 0 ; $i < count($result); $i++)
        <div class ="list-main-imgbox">
          <img class="list-main-img" src="{{URL::asset('/img/'.$result[$i])}}">
        </div>
        @endfor
      </div>
  
      <div class="list-main-content-box">
        <div class ="list-main-title">
          <h5 class ="list-main-title-title">{{ $goods->goods_title }}</h5>
         <div class ="list-main-price">₩{{number_format($goods->goods_price)}}</div>
  
          <div class ="list-main-content-content" >
              <div class ="list-main-content-title">DESCRIPTION :</div>
              <div class ="list-main-content-des">{!! $goods->goods_description !!}</div>
          </div>
  
          <div class ="list-main-size">
            <div class ="list-main-size-title">SIZE : </div>
            <div class ="list-main-size-des">{{ $goods->size }}</div>
          </div>
        </div>
  
        <div class ="list-main-form">
          <form action="/cartprocess" id="cartForm">
              <select class="list-main-color" id="list-main-color" name="color">
                <option value="null">-[필수] COLOR-</option>
                <?php $getColors = json_decode($goods->goods_color);  ?>
                @for($i = 0; $i < count($getColors); $i++)
                <option value="{{ $getColors[$i] }}">{{ $getColors[$i] }}</option>
                @endfor
              </select>
  
              <div class ="selec-complete">
                <div class ="selec-complete-des">  
                  
                    
                       
                  <input type="hidden" value="{{ $goods->id }}" name="goods_id">
                  <input type="hidden" value="{{ $goods->goods_title }}" class="goods_title">
                </div>
  
              {{-- 컬러 선택후 나오는 화면 --}}
              <aiticle class = selec-comple-hidebox>
              </aiticle>
              {{-- 컬러 선택후 나오는 화면 --}}
  
              @if(Auth::user())
                <input type="hidden" value="{{ Auth::user()->id }}" name="usernum" class="usernum">
                @else
                <input type="hidden" name="usernum" value="" class="usernum">
                @endif
  
                
  
                <div class ="selec-complete-price">
                  <div class="total-price">Total Price:<span class="total">0</span><span>원</span> </div>
                  <div class="btngrup">
                  <button type="submit" class="payment-btn">BUY IT NOW</button>
                  <button type="submit" class="cart-btn">CART</button> 
                </div>
  
                </div>
                </div>
  
                <input type="hidden" value="" class="list-main-form-hidden" name="hidden">
            </div>  
          </form>
        </div>
      </div>
   </article>
  
  
   <CENTER><h5 class ="detail-h5">DETAIL</h5></CENTER>
  
   <center><article class = "list-detail-box">
        <?php $result = json_decode($goods->contentphoto); ?>
        @for($i = 0 ; $i < count($result); $i++)
        <div class = 'list-detail'>
          <img class="list-detail-img" src="{{URL::asset('/img/'.$result[$i])}}">
        </div>
        @endfor
   </article></center>
    
          
      <form action="/api/ttt" method="post" id="form" enctype="multipart/form-data">
        @csrf
          <div class="review">
                <div class="reviewTitle">REVIEW</div>               
                <textarea class="form-control" id="editor1" name="reply_content" ></textarea>
                
                <script>
                $( document ).ready( function() {
                  $( 'textarea#editor1' ).ckeditor();
              } );
              </script>
            
              <input type="hidden" class="ckeditorval" name="reply">
              <div class="reviewcontent">
                <div class="filebox"> 
  
                  <a href="javascript:" onclick="fileUploadAction();" class="my_button"><i class="fas fa-camera"></i> PHOTO</a>
              <input type="file" id="input_imgs" name="review_photo[]"multiple/>
                  <select name="star" class="star">
                    <option value=5>★★★★★</option>
                    <option value=4>★★★★☆</option>
                    <option value=3>★★★☆☆</option>
                    <option value=2>★★☆☆☆</option>
                    <option value=1>★☆☆☆☆</option>
                  </select>
                </div>
                <div>
  
                <button class="reviewBtn" type="submit">리뷰등록</button>
                </div>
             </div>
             <div class="imgs_wrap">
              
            </div>
  
            @if(Auth::user())
            <input type="hidden" name="userid" value="{{ Auth::user()->userid }}">
            <input type="hidden" name="writer" value="{{ Auth::user()->name }}">
            @endif
            <input type="hidden" name="goodsid" value="{{ $goods->id }}">
        </form>
  
        @endforeach 
        <?php $star = ""; ?>
        <center><div class="reviews-border"></div></center>
        @foreach ($comment as $comments)
        <?php 
          $stars = ['★☆☆☆☆','★★☆☆☆','★★★☆☆','★★★★☆','★★★★★'];       
          for($i = 0 ; $i < count($stars); $i++){
            if((int)$comments->star == ($i+1)){
              $star = $stars[$i];
              
            }
          }
           
        ?>
      <div class="review-box">
        <div class="reviews-box">
  
            <div class=writerStar>
              <div class="replyWriter">작성자 : {{ $comments->reply_writer }}</div>
              <div class="replyStar">{{ $star }}</div>
            </div>
              <p class="replyContent" >{!! $comments->reply_content !!}</p>
              <input type="hidden" data-update="{{ $comments->id }}" value="{{$comments->reply_content  }}">
  
              <div class="replyPhotoBox">
                <?php $photo = json_decode($comments->reply_photo)?>
                @for($i = 0; $i < count($photo) ; $i++)
                <div>
                  <img class="replyPhotos" src="{{URL::asset('/img/'.$photo[$i])}}">
                </div>          
                @endfor   
              </div> 
  
              @if(Auth::user())
                @if(Auth::user()->userid === $comments->reply_userid)
              <div class="reviewupdelBtn">
                <a href="#"class="reviewUpdateBtn" data-update="{{ $comments->id }}">수정</a>
                <a href="#" class="reviewDelBtn" data-update="{{ $comments->id }}" data-toggle="modal" data-target="#reviewDelModal">
                  삭제
                </a>
                
                
              </div>
                @endif
              @endif
              
              <form action="/api/updatereview" method="post" id="updateForm{{ $comments->id }}" enctype="multipart/form-data">
                @csrf
                  <div class="reviewUpdate" data-update="{{ $comments->id }}">               
                        <textarea class="form-control" id="updateEditor{{ $comments->id }}" name="reply_content" data-update="{{ $comments->id }}"></textarea>            
  
                        <?php
                        echo("<script type='text/javascript'>
                          $(document).ready(function() {
                            $( 'textarea#updateEditor$comments->id' ).ckeditor();
  
                            $('.reviewUpdateResult').hover(function(){
                              var ContentFromEditor = CKEDITOR.instances.updateEditor$comments->id.getData();
                              $('.updateEditorVal$comments->id').val(ContentFromEditor);
                            });
                           
                          } ); 
                          </script>         
                          ")
                        ?>
  
                      <input type="hidden" class="updateEditorVal{{ $comments->id }}" name="reply">
                      <div class="reviewcontent">
                        <div class="filebox"> 
                          <a href="javascript:" onclick="
                            updataFileUploadAction();"
                             class="my_button"><i class="fas fa-camera"></i> PHOTO</a>
                      <input type="file" id="input_img" name="review_photo[]"multiple/>
                          <select name="star" class="star">
                            <option value=5>★★★★★</option>
                            <option value=4>★★★★☆</option>
                            <option value=3>★★★☆☆</option>
                            <option value=2>★★☆☆☆</option>
                            <option value=1>★☆☆☆☆</option>
                          </select>
                        </div>
                        <div>
                          {{-- <a href="javascript:" class="my_button" onclick="submitAction();">업로드</a> --}}
                        <input type="hidden" value="{{ $comments->id }}" name="reviewid" class="commentid">
                        <button class="reviewUpdateCancel"type="button" data-update="{{ $comments->id }}"><i class="fas fa-times" id="cancelIcon"></i> 취소</button>
                        <button class="reviewUpdateResult" type="submit" data-update="{{ $comments->id }}">수정완료</button>                
                      </form>
                        </div>
                     </div>
                     <div class="reviewImgsWrap">                 
                    </div>
                </div>         
              </div>
        @endforeach
      </div>
      <div class="modal fade" id="reviewDelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">게시물 삭제</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              리뷰를 정말 삭제하시겠습니까?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="reviewDelModal">삭제하기</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">취소하기</button>
            </div>
          </div>
        </div>
      </div>


</body>
</html>