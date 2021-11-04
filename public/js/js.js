
'use strict';

$('.navbar__togleButton').click(() => {
    $('.navbar__menu').toggleClass('active');
    $('.navbar__icons').toggleClass('active');
})

$(document).ready(function(){
    $(".menu>a").click(function(){
        $(this).next('ul').toggleClass('hide');
    });
});


function OpenSeconderyCategory(){

    $('.category2').attr('class','active');
    var cid = $('.category1').val();
    // var cut = clicked_id.split('-');
    // var cid = cut[1];

    $.ajax({
        url:'/api/getsccategory',
        method:'post',
        data:{clicked_id:cid}

    }).done(function(result){
        $('#category2').children().remove();

        var str ="<option>2차분류</option>";
        $.each(result,function(i){
            str += '<option>' + result[i].category2_name + '</option>'
        });
        $('#category2').append(str);


    })
}


function addMainCategory(){
    var aa = $('.catadd_input').val();
    $.ajax({
        url:'/api/addMainCategory',
        type:'post',
        data:{category1_name:aa},
        success:function(result){
            history.go(0);
        }
    })
}


function addSeconderyCategory(){
    let data = $('.catadd2_input').val();
    let value = $('#chgvalue').val();

    $.ajax({
        url:'/api/addsecondcategory',
        type:'post',
        data:{category2_name:data,category1_id:value },
        success:function(result){
            var str="";
            $.each(result,function(i){
                str += '<div class="scCategorys">';
                str+= '<div class="scCategoryName">' + result[i].category2_name + '</div>';
                str += '<div class="categoryDel" data-code = "2" data-idx="'+ result[i].id+'" data-toggle="modal" data-target="#exampleModal"> ';
                str += '<i class="fas fa-backspace "></i>';
                str += '</div>';
                str += '</div>';
            });


            $('#secondCategoryDiv').append(str);
            $('.catadd2_input').val("");

        }
    })
}

function clickCategory(clicked_id){

    $('#chgvalue').val(clicked_id);

    $.ajax({
        url:'api/getsccategory',
        type:'post',
        destroy: true,
        data:{clicked_id:clicked_id},

    }).done(function(result){

        $("#table").find("tr:gt(0)").remove();
        $('#secondCategoryDiv').children().remove();
        var str="";
            str += '<center><div class="secondCategoryTitle"><b>SecondCategory</b> <i class="fas fa-plus-circle" id="plusIcon"></i></div>'
        $.each(result,function(i){
            str += '<div class="scCategorys">';
            str += '<div class="scCategoryName">' + result[i].category2_name + '</div>';
            str += '<div class="categoryDel" data-code = "2" data-idx="'+ result[i].id+'" data-toggle="modal" data-target="#exampleModal"> ';
            str += '<i class="fas fa-backspace "></i>';
            str += '</div>';
            str += '</div>';
        });
        str += '</center>'
        $('#secondCategoryDiv').append(str);


    });

}

    $(document).on('click','#plusIcon',function(){
        $('.cataddd_div').toggleClass('cataddd_active');
    })

 $(function(){

    $('#cat2-title-div span a').each(function() {
    const pathname = (window.location.pathname.match(/[^\/]+$/)[0]);
    const set = $(this).attr('href');
    const cut = set.split('/');
    const url = cut[3];

    if (cut[3] == pathname)
    {
         $(this).addClass('current');
    }

    });
 });



 $(document).ready(function(e){


     var maxField = 20;
     var wrapper = $('.append');
     var extcnt = 1;

     var fieldHTML = '<div class="input-group mb-3"><div class="input-group-prepend"> <label class="input-group-text">색상</label></div> <input type="text" class="form-control" name ="goods_color[]"><button id ="del_btn" class="btn btn-danger">DELETE</button></div>';

     $('#add_btn').click(function(e){
         e.preventDefault();
            $('.append').append(fieldHTML);
     });

     $(document).on('click', '#del_btn', function(e){
         e.preventDefault();
         $(this).parent('div').remove();
     });

 });

$('.payment-btn').click(function(e){
        if( $('div[name=array]').length == 0){
            e.preventDefault();
            alert('필수 옵션을 선택해주세요');
        }
        e.preventDefault();
        var url = '/api/cartCheck';
        var form = $('#cartForm')[0];
        var formData = new FormData(form);

        $.ajax({
            url:url,
            data:formData,
            enctype: 'multipart/form-data',
            method:'post',
            cache: false,
            contentType:false,
            processData:false
        }).done(function(result)
        {
           if(result == 1){

                if (confirm("장바구니에 동일한 상품이 있습니다\n함께 구매하시겠습니까?")) {
                    $('.list-main-form-hidden').val('payment');
                    $('#cartForm').submit();

                }
           }
           else{
                $('.list-main-form-hidden').val('payment');
                $('#cartForm').submit();
           }
        })
});

$('.cart-btn').click(function(e){
        if( $('div[name=array]').length == 0){
            e.preventDefault();
            alert('필수 옵션을 선택해주세요');
        }
        e.preventDefault();
        var url = '/api/cartCheck';
        var form = $('#cartForm')[0];
        var formData = new FormData(form);

        $.ajax({
            url:url,
            data:formData,
            enctype: 'multipart/form-data',
            method:'post',
            cache: false,
            contentType:false,
            processData:false
        }).done(function(result)
        {
           if(result == 1){

                if (confirm("장바구니에 동일한 상품이 있습니다\n장바구니에 추가하시겠습니까?")) {
                    $('.list-main-form-hidden').val('cart');
                    $('#cartForm').submit();

                }
           }
           else{
                $('.list-main-form-hidden').val('cart');
                $('#cartForm').submit();
           }
        })


});




function chgInteger(result){
    var chg = /[^0-9]/g;
    var chgint = result.replace(chg,"");
    var compl = Number(chgint);
    return compl;
}

$(document).ready(function(){

    var wrapper = $('.selec-comple-hidebox');
    var temp = [];
    var total = $('.total');
    var price = $(".list-main-price").text();
    var result = chgInteger(price);
    var results = 0;
    var datanum = 0;
    $('.list-main-color').change(function(){
        datanum++;
        const color = $('.list-main-color').val();
        const complete =$('.selec-comple-hidebox');
        var array = $('div[name=array]').length;
        var bool = true;
        var fieldHTML ="";
        for(var i = 0 ; i < array; i ++){
           temp[i] = color;
           if(temp[i] == $('input[name="array[]"]')[i].value){
               alert('이미 선택한 옵션입니다.');
               bool = false;

           }
        }

    if(color != 'null' && bool != false){

        fieldHTML += '<div class ="selec-complete-1" name="comple[]" data-num = "'+datanum+'">';
        fieldHTML += '<div class="selec-complete-color" id="selec-complete-color" data-num = "'+datanum+'">'
        fieldHTML += '<div class="list-complete-title" data-num = "'+datanum+'">'+$('.goods_title').val()+'</div>';
        fieldHTML += '<div class ="list-complete-color" name="array" data-num = "'+datanum+'">-'+color+'</div>';
        fieldHTML += '<input type="hidden" name ="array[]" value="'+color+'" data-hidden = "'+datanum+'">';
        fieldHTML += '</div>';
        fieldHTML += '<div class="selec-countbox" data-num = "'+datanum+'">';
        fieldHTML += '<input type="text" class ="cntbox-input" value=1 name ="cntbox[]" data-num = "'+datanum+'">';
        fieldHTML += '<div class ="updownbtn" data-num = "'+datanum+'">';
        fieldHTML += '<div><a href="#" class = "upicon-c" data-num = "'+datanum+'"><i class="fas fa-sort-up fa-xs" id="upicon" data-num = "'+datanum+'"></a></i></div>';
        fieldHTML += '<div data-num = "'+datanum+'"><a href="#"><i class="fas fa-caret-down fa-xs" id="downicon" data-num = "'+datanum+'"></a></i></div>  ';
        fieldHTML += '</div>  ';
        fieldHTML += '<div class = delbtn data-num = "'+datanum+'">';
        fieldHTML += '<div class ="delicon" data-num = "'+datanum+'"><a href="#"><i class="fas fa-minus fa-xs" id="delicon" data-num = "'+datanum+'"></a></i></div>';
        fieldHTML += '</div>';
        fieldHTML += '</div>';
        fieldHTML += '</div>';

        //  complete.empty();
         complete.append(fieldHTML);

         results = chgInteger(total.text())+result;
         console.log(results);
         total.empty();
         total.append(priceToString(results));

        }

 });

    $(wrapper).on('click', '#delicon', function(e){
        e.preventDefault();

        var total = $('.total');
        var price = $(".list-main-price").text();
        var result = chgInteger(price);
        var results = 0;
        var getData = $(this).data('num');
        var input = $("input[data-num='"+getData+"']").val();

        $("div[data-num='"+getData+"']").remove();

        results = chgInteger(total.text()) - (result*input);

        total.empty();
        total.append(priceToString(results));
        // }
    });
})


$(document).on('click','#upicon',function(e){
    e.preventDefault();
    var total = $('.total');
    var price = $(".list-main-price").text();
    var result = chgInteger(price);
    var results = 0;

    var getData = $(this).data('num');
    var num = $("input[data-num='"+getData+"']").val() ;
    num = Number(num) + 1;
    $("input[data-num='"+getData+"']").val(num);

    results = chgInteger(total.text()) + result;

    total.empty();
    total.append(priceToString(results));

});

$(document).on('click','#downicon',function(e){
    e.preventDefault();

    var total = $('.total');
    var price = $(".list-main-price").text();
    var result = chgInteger(price);
    var results = 0;

    var getData = $(this).data('num');
    var num = $("input[data-num='"+getData+"']").val() ;
    num = Number(num) - 1;
    if(num < 1){
        alert('최소 주문수량은 1개 이상입니다.');
    }
    else{
    $("input[data-num='"+getData+"']").val(num);

    results = chgInteger(total.text()) - result;

    total.empty();
    total.append(priceToString(results));
    }
 });

 function priceToString(price) {
    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

$(document).ready(function(){

    var chkArray = new Array();

    $('.selectbtn').click(function(e){

        $('input[name="cartcheck[]"]:checked').each(function(){
            var tmpVal = $(this).val();
            chkArray.push(tmpVal);
        });


        if(chkArray.length < 1){
            e.preventDefault();
            alert('상품을 선택해주세요.');
            return;
        }

    });
});

$(document).ready(function(){

    var chkArray = new Array();

    $('.selectDelBtn').click(function(e){

        $('.deleteVel').val('delete');

        $('input[name="cartcheck[]"]:checked').each(function(){
            var tmpVal = $(this).val();
            chkArray.push(tmpVal);
        });


        if(chkArray.length < 1){
            e.preventDefault();
            alert('상품을 선택해주세요.');
            return;
        }

    });
});

$(function(){
    $('.totalbtn').click(()=>{
        $("input[type=checkbox]").prop("checked",true);
    })
})

$(function(){
    $("#allCheck").click(function(){
    if($("#allCheck").prop("checked")) {
        $("input[type=checkbox]").prop("checked",true);
     } else {
         $("input[type=checkbox]").prop("checked",false);
        }
    })
})

    function orderPay() {
        var IMP = window.IMP;
        IMP.init("imp66472426");

        let today = new Date();
        let hours = today.getHours();
        let minutes = today.getMinutes();
        let seconds = today.getSeconds();
        let milliseconds = today.getMilliseconds();

        let results = String(hours) + String(minutes) + String(seconds)+ String(milliseconds);
        let price = $('#total_price').val();
        let userid = $('#userids').val();
        let usernames = $('#usernames').val();

        let name = $('#ReceiverName').val();
        let tel = $('#ReceiverTel').val();
        let post = $('.ReceiverPost').val();
        let addr = $('.ReceiverAddr').val();
        let detailaddr = $('.ReceiverDetailaddr').val();
        var email = $('#orderInforEmail').val();
        let buyerAddr = addr+detailaddr;

        if(email == ""){
            return alert('이메일을 입력해주세요');
        }
        if(tel == ""){
            return alert('휴대전화번호를 입력해주세요');
        }
        if(post ==""){
            return alert('주소를 입력해주세요');
        }
        if(name ==""){
            return alert('받으시는분 성함을 입력해주세요');
        }

        var length = $('input[name="orderColor[]"]').length;
        var orderList = new Array();
        for(var i = 0 ; i < length ; i++){
            orderList.push({
                color : $('input[name="orderColor[]"]')[i].value,
                title : $('input[name="orderTitle[]"]')[i].value,
                number : $('input[name="orderNumber[]"]')[i].value,
                photo : $('input[name="orderPhoto[]"]')[i].value,
               });
            }

        IMP.request_pay({
            pg: "KICC",
            pay_method: "card",
            merchant_uid: $('#userids').val()+'_'+results,
            name: '재혁샵',
            amount: price,
            buyer_email: email,
            buyer_name: name,
            buyer_tel: tel,
            buyer_addr: buyerAddr,
            buyer_postcode: post,

        }, function (rsp) {

            if (rsp.success) {
                $.ajax({
                  method: 'post',
                  url: '/api/orderprocess',
                  data: {
                            'imp_uid': rsp.imp_uid,
                            'merchant_uid': rsp.merchant_uid,
                            'orderlist':orderList,
                            'userid':userid
                  },
                  success: function(data) {
                      alert('결제가 완료되었습니다.');
                      window.location.href = 'http://127.0.0.1:8000/orderinfo/'+data;
                   },

                   error: function() {
                       console.log("error");
                   }
                  })
            } else {
                alert("결제에 실패하였습니다. 에러 내용: " +  rsp.error_msg);
            }
        });
      }


function getUrl(text){
    var title = text;
    $.ajax({
        url:'/api/titleClick',
        method:'post',
        data:{
            title:title
        }
    }).done(function(result){
        $.each(result, function(i){
        var url = result[i].id
        var newWindow = window.open("about:blank");
        newWindow.location.href = 'http://127.0.0.1:8000/list/'+url;
    });
});

}

$(document).ready(function(){
    $('.statebtn').click(function(){
        var number = $(this).data('ordernumber');
        var state = $("select[data-ordernumber='"+number+"']").val();

        $.ajax({
            url:'/api/statechg',
            method:'post',
            data:{
                number:number,
                state:state
            }
        }).done(function(){
            history.go(0);
        })

    })
})

$(document).on('click','.categoryDel',function(){
        var num = $(this).data('idx');
        var code = $(this).data('code');
        $('.modal-footer #delmodal').data('num',num);
        $('.modal-footer #delmodal').data('code',code);
});


$(function(){
    $('#delmodal').click(()=>{
        var num = $('#delmodal').data('num');
        var code = $('#delmodal').data('code');

     var del = $.ajax({
                 url:'api/delcategory',
                 method:'post',
                  data:{
                      num:num,
                      code:code
                  }

             });
             del.done(function(result){
                 if(result){
                    $('#secondCategoryDiv').children().remove();
                    var str="";
                        str += '<center><div class="secondCategoryTitle"><b>SecondCategory</b> <i class="fas fa-plus-circle" id="plusIcon"></i></div>'
                    $.each(result,function(i){
                        str += '<div class="scCategorys">';
                        str += '<div class="scCategoryName">' + result[i].category2_name + '</div>';
                        str += '<div class="categoryDel" data-code = "2" data-idx="'+ result[i].id+'" data-toggle="modal" data-target="#exampleModal"> ';
                        str += '<i class="fas fa-backspace "></i>';
                        str += '</div>';
                        str += '</div>';
                    });
                    str += '</center>'
                    $('#secondCategoryDiv').append(str);
                 }
                 else{
                 history.go(0);

                 }
             });
             del.fail(function(result){
                console.log(result);
             })

    });
});



$(document).on('click','#cartCntBoxUp',function(e){
    e.preventDefault();
    var getData = $(this).data('int');
    var num = $("input[data-int='"+getData+"']").val() ;
    num = Number(num) + 1;
    $("input[data-int='"+getData+"']").val(num);
})

$(document).on('click','#cartCntBoxDown',function(e){
    e.preventDefault();

    var getData = $(this).data('int');
    var num = $("input[data-int='"+getData+"']").val();
    num = Number(num) - 1;
    if(num < 1){
        alert('최소 주문수량은 1개 이상입니다.');
    }
    else{
    $("input[data-int='"+getData+"']").val(num);
    }
});

$(document).on('click','.cartCntBoxChgBtn',function(){
    var getData = $(this).data('int');
    var number = $("input[data-int='"+getData+"']").val();

    $.ajax({
        url:'/api/setnumber',
        data:{
            number:number,
            id:getData,
        },
        method:"post",
        success:function(result){
            history.go(0);
            alert('해당상품의 수량이 '+result+'개로 변경되었습니다');
        },
        error:function(result){
            console.log(result);
        }
    });
});



$(document).on('click','.reviewUpdateBtn',function(e){
    e.preventDefault();

    var getId = $(this).data('update');
    var text = $("input[data-update='"+getId+"']").val();
    $("textarea[data-update='"+getId+"']").val(text);
    $("div[data-update='"+getId+"']").css('display','block');

})

$(document).on('click','.reviewUpdateCancel',function(){
    var getId = $(this).data('update');
    $("div[data-update='"+getId+"']").css('display','none');
});

        var sel_files = [];
        $(document).ready(function() {

            $("#input_imgs").on("change", handleImgFileSelect);
        });

        function fileUploadAction() {
            console.log("fileUploadAction");
            $("#input_imgs").trigger('click');
        }

        function handleImgFileSelect(e) {

            // 이미지 정보들을 초기화
            sel_files = [];
            $(".imgs_wrap").empty();

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);

            var index = 0;
            filesArr.forEach(function(f) {
                if(!f.type.match("image.*")) {
                    alert("확장자는 이미지 확장자만 가능합니다.");
                    return;
                }

                sel_files.push(f);

                var reader = new FileReader();
                reader.onload = function(e) {
                    var html = "<a href=\"javascript:void(0);\" onclick=\"deleteImageAction("+index+")\" id=\"img_id_"+index+"\"><img src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selProductFile'></a>";
                    $(".imgs_wrap").append(html);
                    index++;

                }
                reader.readAsDataURL(f);

            });
        }


        $('.reviewBtn').on('click',function(e){

            e.preventDefault();
            var ContentFromEditor = CKEDITOR.instances.editor1.getData();

            var dataString = $("#Form").serialize();
                dataString += ContentFromEditor;

            $('.ckeditorval').val(dataString);

             var url = $('#form').attr('action');
             var form = $('#form')[0];
             var formData = new FormData(form);

             $.ajax({
                url:url,
                data:formData,
                enctype: 'multipart/form-data',
                type:'post',
                success:function(data){
                    if(data == 1){
                    history.go(0);
                    }
                    else{
                        alert('로그인을 해주세요.');
                    }

                },
                error: function(data){
                    alert('내용을 입력해주세요.');
                },
                cache: false,
                contentType:false,
                processData:false
             });


        });




 $(document).on('click','.reviewDelBtn',function(e){
     e.preventDefault();
    var id = $(this).data('update');
    $('#reviewDelModal').data('update',id);
  })

  $(document).on('click','#reviewDelModal',function(){
    var id = $(this).data('update');
        $.ajax({
        url:'/api/reviewdel',
        data:{
            id:id
        },
        method:'post',
        success:function(){
            history.go(0);
        }
    })

  });

  $(document).on('click','#existingInfor',function(){

      var orderInforName = $('#orderInforName').val();
      var orderInforTel = $('#orderInforTel').val();
      var orderInforPost = $('.orderInforPost').val();
      var orderInforAddr = $('.orderInforAddr').val();
      var orderInforDetailaddr = $('.orderInforDetailaddr').val();


      $('#ReceiverName').val(orderInforName);
      $('#ReceiverTel').val(orderInforTel);
      $('.ReceiverPost').val(orderInforPost);
      $('.ReceiverAddr').val(orderInforAddr);
      $('.ReceiverDetailaddr').val(orderInforDetailaddr);

  });

  $(document).on('click','#newInfor',function(){
    $('#ReceiverName').val("");
    $('#ReceiverTel').val("");
    $('.ReceiverPost').val("");
    $('.ReceiverAddr').val("");
    $('.ReceiverDetailaddr').val("");
  })

  function sidenav_open() {
    $("#sidenav").addClass('open');
    $("#dark-screen").fadeIn();
    $("#sidenav-menu").css('right','0');
  }
  function sidenav_close() {
    $("#sidenav").removeClass('open');
    $("#dark-screen").fadeOut();
    $("#sidenav-menu").css('right','-200px');
  }

  $("#sidenav-toggle").click(function() {
      event.stopPropagation();
    if( $("#sidenav").hasClass('open') ) sidenav_close();
    else sidenav_open();

  });
  $("#close-sidenav").click(sidenav_close);
  $(window).click(sidenav_close);



$(document).on('click','#goodsDel',function(){
    var id = $(this).data('delid');
    $('#goodsdelmodalBtn').data('delid',id);
})
$(document).on('click','#goodsdelmodalBtn',function(){
    var id = $(this).data('delid');
    $.ajax({
        url:'/api/goodsdel',
        data:{
            id:id
        },
        method:'post',
        success:function(){
            history.go(0);
        }
    })
})
$('#searchIcon').click(function(){
    $('#searchForm').submit();
})



  var myIndex = 0;
  carousel();

  function carousel() {
    var i;

    var x = $('.list-main-img');
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 4000);
  }







































