$(document).ready(function(){
    if($('#userids').val() != $('#useridss').val()){
        history.go(-1);
    }
})