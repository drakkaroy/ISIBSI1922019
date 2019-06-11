$(document).ready(function(){

    var checkPassword = function(str){
        var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
        return re.test(str);
        
    }

    $('#inputPassword').blur(function(){
        
        if(!checkPassword($(this).val())){
            $('.pass-msn').show();
        }else{
            $('.pass-msn').hide();
        }
    });

});