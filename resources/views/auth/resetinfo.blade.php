<!DOCTYPE html>
<html lnag="ko">
    <head>
        <meta charset="UTF-8">
        <title>회원가입</title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/join.css')?>" >
        
    </head>
    <body>

        <script  src="http://code.jquery.com/jquery-latest.min.js" defer></script>
        <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/edituserinfo.js') }}" defer></script>
        <script type="text/javascript" src="{{ URL::asset('js/join.js') }}" defer></script>

        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
                alert(msg);
            }
        </script>

        @if (count($errors) > 0)
        <div class="alert-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- header -->
        <div id="header">
            EDIT USER INFORMATION
        </div>


        <!-- wrapper -->
     @foreach ($user as $users )
         
     
        <div id="wrapper">

            <!-- content-->
            <div id="content">
                <form action="/edituser/{{ Auth::user()->id }}" method="post">
                    @csrf
              
             

                <!-- NAME -->
                <div>
                    <h3 class="join_title"><label for="name">이름</label></h3>
                    <span class="box int_name">
                        <input type="text" id="name" class="int" maxlength="20" name="name" value="{{ $users->name }}">
                    </span>
                    <span class="error_next_box"></span>
                </div>

                <!-- BIRTH -->
                <div>
                    <h3 class="join_title"><label for="yy">생년월일</label></h3>
                    <div id="bir_wrap">
                        <!-- BIRTH_YY -->
                        <div id="bir_yy">
                            <span class="box">
                                <input type="text" id="yy" class="int" maxlength="4" placeholder="년(4자)" name="dayfirst" value="{{ $users->birthday }}">
                            </span>
                        </div>
                       
                        <input type="hidden" value="{{ $users->birthdaymiddel }}" id="birthdaymiddel">
                        <!-- BIRTH_MM -->
                        <div id="bir_mm">
                            <span class="box">
                                <select id="mm" class="sel" name="daymiddle">
                                    <option>월</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>                                    
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </span>
                        </div>

                    
                        <!-- BIRTH_DD -->
                        <div id="bir_dd">
                            <span class="box">
                                <input type="text" id="dd" class="int" maxlength="2" placeholder="일" name="daylast" value="{{ $users->birthdaylast }}">
                            </span>
                        </div>

                    </div>
                    <span class="error_next_box"></span>    
                </div>

                <!-- GENDER -->
                <input type="hidden" value="{{ $users->sex }}" id="sex">
                <div>
                    <h3 class="join_title"><label for="gender">성별</label></h3>
                    <span class="box gender_code">
                        <select id="gender" class="sel" name="sex">
                            <option>성별</option>
                            <option value="남자">남자</option>
                            <option value="여자">여자</option>
                        </select>                            
                    </span>
                    <span class="error_next_box">필수 정보입니다.</span>
                </div>

                <!-- EMAIL -->
                <div>
                    <h3 class="join_title"><label for="email">이메일</label></h3>
                    <span class="box int_email">
                        <input type="text" id="email" class="int" maxlength="100" placeholder="이메일" name="email" value="{{ $users->email }}">
                    </span>
                    <span class="error_next_box">이메일 주소를 다시 확인해주세요.</span>    
                </div>

                <!-- MOBILE -->
                <div>
                    <h3 class="join_title"><label for="phoneNo">휴대전화</label></h3>
                    <span class="box int_mobile">
                        <input type="tel" id="mobile" class="int" maxlength="16" placeholder="전화번호 입력" name="tel" value="{{ $users->tel }}">
                    </span>
                    <span class="error_next_box"></span>    
                </div>

                <div class ="join_addr">
                <h3 class="join_title"><label for="addr">주소</label></h3>
                <input type="text" id="sample6_postcode" placeholder="우편번호" name="post" value="{{ $users->post }}">
                <button type="button" class="searchpost" onclick="sample6_execDaumPostcode()">우편번호 검색</button><br>
                <input type="text" id="sample6_address" placeholder="주소" name="addr" value="{{ $users->addr }}"><br>
                <div class="addr_detail">
                <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="detailaddr" value="{{ $users->detailaddr }}">
                <input type="text" id="sample6_extraAddress" placeholder="참고항목">
                </div>
                </div>
                @endforeach
                <!-- JOIN BTN-->
                <center><div class="btn_area">
                    <button type="submit" id="btnJoin">
                        <span>SUBMIT</span>
                    </button>
                </div></center>
            </form>
                

            </div> 
            

        </div> 

    
    
    </body>
</html>