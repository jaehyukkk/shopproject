<!DOCTYPE html>
<html lnag="ko">
    <head>
        <meta charset="UTF-8">
        <title>회원가입</title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/join.css')?>" >
        
    </head>
    <body>

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
            JAEHYUKSHOP
        </div>


        <!-- wrapper -->
     
        <div id="wrapper">

            <!-- content-->
            <div id="content">
                <form action="/join" method="post">
                    @csrf
                <!-- ID -->
                <div>
                    <h3 class="join_title">
                        <label for="id">아이디</label>
                    </h3>
                    <span class="box int_id">
                        <input type="text" id="id" class="int" maxlength="20" name="userid">
                    </span>
                    <span class="error_next_box"></span>
                </div>

                <!-- PW1 -->
                <div>
                    <h3 class="join_title"><label for="pswd1">비밀번호</label></h3>
                    <span class="box int_pass">
                        <input type="password" id="pswd1" class="int" maxlength="20" name="password">
                        <span id="alertTxt">사용불가</span>
                        <img class="pswdImg" id="pswd1_img1" src="{{URL::asset('/img/m_icon_pass.png')}}">
                    </span>
                    <span class="error_next_box"></span>
                </div>
                
                <!-- PW2 -->
                <div>
                    <h3 class="join_title"><label for="pswd2">비밀번호 재확인</label></h3>
                    <span class="box int_pass_check">
                        <input type="password" id="pswd2" class="int" maxlength="20" name="repassword">
                        <img class="pswdImg" id="pswd2_img1" src="{{URL::asset('/img/m_icon_check_disable.png')}}">
                    </span>
                    <span class="error_next_box"></span>
                </div>

                <!-- NAME -->
                <div>
                    <h3 class="join_title"><label for="name">이름</label></h3>
                    <span class="box int_name">
                        <input type="text" id="name" class="int" maxlength="20" name="name">
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
                                <input type="text" id="yy" class="int" maxlength="4" placeholder="년(4자)" name="dayfirst">
                            </span>
                        </div>

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
                                <input type="text" id="dd" class="int" maxlength="2" placeholder="일" name="daylast">
                            </span>
                        </div>

                    </div>
                    <span class="error_next_box"></span>    
                </div>

                <!-- GENDER -->
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
                        <input type="text" id="email" class="int" maxlength="100" placeholder="이메일" name="email">
                    </span>
                    <span class="error_next_box">이메일 주소를 다시 확인해주세요.</span>    
                </div>

                <!-- MOBILE -->
                <div>
                    <h3 class="join_title"><label for="phoneNo">휴대전화</label></h3>
                    <span class="box int_mobile">
                        <input type="tel" id="mobile" class="int" maxlength="16" placeholder="전화번호 입력" name="tel">
                    </span>
                    <span class="error_next_box"></span>    
                </div>

                <div class ="join_addr">
                <h3 class="join_title"><label for="addr">주소</label></h3>
                <input type="text" id="sample6_postcode" placeholder="우편번호" name="post">
                <button type="button" class="searchpost" onclick="sample6_execDaumPostcode()">우편번호 검색</button><br>
                <input type="text" id="sample6_address" placeholder="주소" name="addr"><br>
                <div class="addr_detail">
                <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="detailaddr">
                <input type="text" id="sample6_extraAddress" placeholder="참고항목">
                </div>
                </div>
                
                <!-- JOIN BTN-->
                <center><div class="btn_area">
                    <button type="submit" id="btnJoin">
                        <span>JOIN</span>
                    </button>
                </div></center>
            </form>
                

            </div> 
            

        </div> 

    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/join.js') }}" defer></script>
    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    </body>
</html>