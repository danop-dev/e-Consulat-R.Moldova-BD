// send data register with ajax
$("#submitReg").click(function(e){
    e.preventDefault();
    $('.alert-info').html('');
    $('.alert-info').removeClass('alert-info--error');
    $('.alert-info').removeClass('alert-info--succes');
    

    let reg_email = $("#reg_email").val();
    let reg_fname = $("#reg_fname").val();
    let reg_lname = $("#reg_lname").val();
    let reg_psw = $("#reg_psw").val();
    let reg_pswCheck = $("#reg_pswCheck").val();


    $.ajax({
        type: 'POST',
        url: 'php/register.php',
        data:{
            reg_email: reg_email,
            reg_fname: reg_fname,
            reg_lname: reg_lname,
            reg_psw: reg_psw,
            reg_pswCheck: reg_pswCheck
        },
        dataType: "json",
        success: function(response){
            if(response.statusCode == 200){
                $('.alert-info').html('SUCCES');
                $('.alert-info').addClass('alert-info--succes');
                $(".data-inp").val('');
            } else if(response.statusCode == 201){
                $('.alert-info').html('ERROR: Ceva nu ai introdus corect!');
                $('.alert-info').addClass('alert-info--error');
            }
        }
    })
});


// send data login with ajax
$("#submitLogin").click(function(e){
    e.preventDefault();
    $('.alert-info').html('');
    $('.alert-info').removeClass('alert-info--error');
    $('.alert-info').removeClass('alert-info--succes');
    

    let login_email = $("#login_email").val();
    let login_psw = $("#login_psw").val();


    $.ajax({
        type: 'POST',
        url: 'php/login.php',
        data:{
            login_email: login_email,
            login_psw: login_psw,
        },
        dataType: "json",
        success: function(response){
            if(response.statusCode == 200){
                $('.alert-info').html('SUCCES');
                $('.alert-info').addClass('alert-info--succes');
                
                location.replace("http://localhost/TEZA%20DE%20AN%20BD/php/dosar.php");
            } else if(response.statusCode == 201){
                $('.alert-info').html('Login sau Parola a fost introdusa incorect');
                $('.alert-info').addClass('alert-info--error');
            }
        }
    })
});