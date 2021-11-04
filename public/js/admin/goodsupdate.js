$(document).ready(function(){
    var id = $('#category2').data('id');
    var scid = $('#category2').data('scid');
    $.ajax({
        url:'/api/getmgmcategory',
        method:'get',
        data:{
            id:id
        }
    }).done(function(result){
        var str ="";
        var tag = $('#category2');
        $.each(result,function(i){
            str += '<option value='+result[i].id+'>' + result[i].category2_name + '</option>'
        });
        tag.append(str);
        $('#category2').val(scid);
    })
    

})