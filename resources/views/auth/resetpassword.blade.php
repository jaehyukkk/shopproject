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
            RESET PASSWORD
        </div>


        <!-- wrapper -->
     
        <div id="wrapper">

            <!-- content-->
            <div id="content">
                <form action="/resetpassword/{{ Auth::user()->id }}" method="post">
                    @csrf
                <!-- ID -->
                <div>
                    <h3 class="join_title"><label for="pswd1">이전 비밀번호</label></h3>
                    <span class="box int_pass">
                        <input type="password" id="pswd1" class="int" maxlength="20" name="oldpassword">
                        <span id="alertTxt">사용불가</span>
                        
                    </span>
                    <span class="error_next_box"></span>
                </div>

                <!-- PW1 -->
                <div>
                    <h3 class="join_title"><label for="pswd1">비밀번호</label></h3>
                    <span class="box int_pass">
                        <input type="password" id="pswd1" class="int" maxlength="20" name="password">
                        <span id="alertTxt">사용불가</span>
                  
                    </span>
                    <span class="error_next_box"></span>
                </div>
                
                <!-- PW2 -->
                <div>
                    <h3 class="join_title"><label for="pswd2">비밀번호 재확인</label></h3>
                    <span class="box int_pass_check">
                        <input type="password" id="pswd2" class="int" maxlength="20" name="repassword">
                    </span>
                    <span class="error_next_box"></span>
                </div>

                <!-- NAME -->
              
                
                <!-- JOIN BTN-->
                <center><div class="btn_area">
                    <button type="submit" id="btnJoin">
                        <span>SUBMIT</span>
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