var sel_files = [];
$(document).ready(function() {
   
    $("#input_img").on("change", handleImgFile);
}); 

function updataFileUploadAction() {
    console.log("fileUploadAction");
    $("#input_img").trigger('click');
}

function handleImgFile(e) {

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
            $(".reviewImgsWrap").append(html);
            index++;

        }
        reader.readAsDataURL(f);
        
    });
}




$('.reviewUpdateResult').on('click',function(e){

    e.preventDefault();
    var code = $(this).data('update');
  

  
     var url = $('#updateForm'+code+'').attr('action');
     var form = $('#updateForm'+code+'')[0];
     var formData = new FormData(form);

     $.ajax({
        url:url,
        data:formData,
        enctype: 'multipart/form-data',
        type:'post',
        success:function(data){
            history.go(0);
            
        },
        error: function(data){
            alert('실패');
        },
        cache: false,
        contentType:false,
        processData:false
     });
    
    
})

