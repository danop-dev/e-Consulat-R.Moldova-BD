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
        url: './php/login.php',
        data:{
            login_email: login_email,
            login_psw: login_psw
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

// send data input with ajax
$("#submitData").click(function(e){
    e.preventDefault();
    $('.alert-info').html('');
    $('.alert-info').removeClass('alert-info--error');
    $('.alert-info').removeClass('alert-info--succes');

    //input value data

    //row
    let officeConsul        = $("#officeConsul").val();
    let serviceConsul       = $("#serviceConsul").val();

    // row
    let fname               = $("#fname").val();
    let fnameBirth          = $("#fnameBirth").val();
    let fnameDad            = $("#fnameDad").val();
    let fnameMom            = $("#fnameMom").val();
    let idnpMom             = $('#idnpMom').val();
    let cetatenie           = $("#cetatenie").val();
    let sex                 = $("#sex").val();
      
    let lname               = $("#lname").val();
    let lnameBirth          = $("#lnameBirth").val();
    let lnameDad            = $("#lnameDad").val();
    let lnameMom            = $("#lnameMom").val();
    let idnpDad             = $('#idnpDad').val();
    let idnp                = $("#idnp").val();
    let birthday            = $("#birthday").val();
      
    let countryBirth        = $("#countryBirth").val();
    let region              = $("#region").val();
    let locality            = $("#locality").val();
      
    // row 
    let checkEmisde         = $("#checkEmisde").val();
    let docSerie            = $("#docSerie").val();
    let numDoc              = $("#numDoc").val();
      
    let typeDoc             = $("#typeDoc").val();
    let emitDate            = $("#emitDate").val();
    let expDate             = $("#expDate").val();
      
    let docValid            = $("#docValid").val();
    let emisDe              = $("#emisDe").val();
      
    // row  
    let countryHome         = $("#countryHome").val();
    let strHome             = $("#strHome").val();
    let numHome             = $("#numHome").val();
      
    let regionHome          = $("#regionHome").val();
    let blocHome            = $("#blocHome").val();
    let etajHome            = $("#etajHome").val();
    let scarHome            = $("#scarHome").val();
    
    let localityForeignHome = $("#localityForeignHome").val();
    let apartmentHome       = $("#apartmentHome").val();
    let zipCodeHome         = $("#zipCodeHome").val();

    // row
    let countryForeign      = $("#countryForeign").val();
    let strForeign          = $("#strForeign").val();
    let numForeign          = $("#numForeign").val();

    let regionForeign       = $("#regionForeign").val();
    let blocForeign         = $("#blocForeign").val();
    let etajForeign         = $("#etajForeign").val();
    let scarForeign         = $("#scarForeign").val();
     
    let localityForeign2    = $("#localityForeign2").val();
    let apartmentForeign    = $("#apartmentForeign").val();
    let zipCodeForeign      = $("#zipCodeForeign").val();
 
    let telData             = $("#telData").val();
    let emailData           = $("#emailData").val();
 
    // row
    let fnameCopil          = $("#fnameCopil").val();
    let cetatenieCopil      = $("#cetatenieCopil").val();
    let sexCopil            = $("#sexCopil").val();
 
    let lnameCopil          = $("#lnameCopil").val();
    let idnpCopil           = $("#idnpCopil").val();
    let birthdayCopil       = $("#birthdayCopil").val();
 
    let countryBirthCopil   = $("#countryBirthCopil").val();
    let regionCopil         = $("#regionCopil").val();
    let localityCopil       = $("#localityCopil").val();
     
    // row
    let payMod              = $("#payMod").val();
    let currency            = $("#currency").val();
    let tax                 = $("#tax").val();

    $.ajax({
        type: 'POST',
        url: '../php/server.php',
        data:{

            officeConsul: officeConsul,
            serviceConsul: serviceConsul,

            fname: fname,
            fnameBirth: fnameBirth,
            fnameDad: fnameDad,
            fnameMom: fnameMom,
            idnpMom: idnpMom,
            cetatenie: cetatenie,
            sex: sex,

            lname: lname,
            lnameBirth: lnameBirth,
            lnameDad: lnameDad,
            lnameMom: lnameMom,
            idnpDad: idnpDad,
            idnp: idnp,
            birthday: birthday,

            countryBirth: countryBirth,
            region: region,
            locality: locality,

            checkEmisde: checkEmisde,
            docSerie: docSerie,
            numDoc: numDoc,

            typeDoc: typeDoc,
            emitDate: emitDate,
            expDate: expDate,

            docValid: docValid,
            emisDe: emisDe,

            countryHome: countryHome,
            strHome: strHome,
            numHome: numHome,

            regionHome: regionHome,
            blocHome: blocHome,
            etajHome: etajHome,
            scarHome: scarHome,

            localityForeignHome: localityForeignHome,
            apartmentHome: apartmentHome,
            zipCodeHome: zipCodeHome,

            countryForeign: countryForeign,
            strForeign: strForeign,
            numForeign: numForeign,

            regionForeign: regionForeign,
            blocForeign: blocForeign,
            etajForeign: etajForeign,
            scarForeign: scarForeign,

            localityForeign2: localityForeign2,
            apartmentForeign: apartmentForeign,
            zipCodeForeign: zipCodeForeign,

            telData: telData,
            emailData: emailData,

            fnameCopil: fnameCopil,
            cetatenieCopil: cetatenieCopil,
            sexCopil: sexCopil,

            lnameCopil: lnameCopil,
            idnpCopil: idnpCopil,
            birthdayCopil: birthdayCopil,

            countryBirthCopil: countryBirthCopil,
            regionCopil: regionCopil,
            localityCopil: localityCopil,

            payMod: payMod,
            currency: currency,
            tax: tax
        },
        dataType: "json",
        success: function(response){
            if(response.statusCode == 200){
                $('.alert-info').html('SUCCES');
                $('.alert-info').addClass('alert-info--succes');
                window.scrollTo({top: 0, behavior: 'smooth'});
                let delayInMilliseconds = 2500;
                setTimeout(function() {
                    location.replace("http://localhost/TEZA%20DE%20AN%20BD/php/dosar.php");
                }, delayInMilliseconds);
            } else if(response.statusCode == 201){
                $('.alert-info').html('Erroare: Ceva a fost introdusa incorect.');
                $('.alert-info').addClass('alert-info--error');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            } else if(response.statusCode == 204){
                $('.alert-info').html('Erroare: Ceva nu a fost introdus.');
                $('.alert-info').addClass('alert-info--error');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
        }
    });
});


// send data for view
let detailsBtn = $('.btn_request');
let codeRequest =  $('.code_request');




for(let i = 0; i < detailsBtn.length; i++) {
    detailsBtn[i].addEventListener('click', (e) => {
        let requestDetails = codeRequest[i].innerHTML;

        e.preventDefault();
        $('.alert-info').html('');
        $('.alert-info').removeClass('alert-info--error');
        $('.alert-info').removeClass('alert-info--succes');

        $.ajax({
            type: 'POST',
            url: '../php/viewServer.php',
            data:{
                requestDetails: requestDetails
            },
            dataType: "json",
            success: function(response){
                if(response.statusCode == 200){
                    location.replace("http://localhost/TEZA%20DE%20AN%20BD/php/viewCerere.php");
                }
            }
        });
    })
};

// send update data input with ajax
$("#saveUpdate").click(function(e){
    e.preventDefault();
    $('.alert-info').html('');
    $('.alert-info').removeClass('alert-info--error');
    $('.alert-info').removeClass('alert-info--succes');

    //input value data

    //row
    let officeConsul        = $("#officeConsul").val();
    let serviceConsul       = $("#serviceConsul").val();

    // row
    let fname               = $("#fname").val();
    let fnameBirth          = $("#fnameBirth").val();
    let fnameDad            = $("#fnameDad").val();
    let fnameMom            = $("#fnameMom").val();
    let idnpMom             = $('#idnpMom').val();
    let cetatenie           = $("#cetatenie").val();
    let sex                 = $("#sex").val();
      
    let lname               = $("#lname").val();
    let lnameBirth          = $("#lnameBirth").val();
    let lnameDad            = $("#lnameDad").val();
    let lnameMom            = $("#lnameMom").val();
    let idnpDad             = $('#idnpDad').val();
    let idnp                = $("#idnp").val();
    let birthday            = $("#birthday").val();
      
    let countryBirth        = $("#countryBirth").val();
    let region              = $("#region").val();
    let locality            = $("#locality").val();
      
    // row 
    let checkEmisde         = $("#checkEmisde").val();
    let docSerie            = $("#docSerie").val();
    let numDoc              = $("#numDoc").val();
      
    let typeDoc             = $("#typeDoc").val();
    let emitDate            = $("#emitDate").val();
    let expDate             = $("#expDate").val();
      
    let docValid            = $("#docValid").val();
    let emisDe              = $("#emisDe").val();
      
    // row  
    let countryHome         = $("#countryHome").val();
    let strHome             = $("#strHome").val();
    let numHome             = $("#numHome").val();
      
    let regionHome          = $("#regionHome").val();
    let blocHome            = $("#blocHome").val();
    let etajHome            = $("#etajHome").val();
    let scarHome            = $("#scarHome").val();
    
    let localityForeignHome = $("#localityForeignHome").val();
    let apartmentHome       = $("#apartmentHome").val();
    let zipCodeHome         = $("#zipCodeHome").val();

    // row
    let countryForeign      = $("#countryForeign").val();
    let strForeign          = $("#strForeign").val();
    let numForeign          = $("#numForeign").val();

    let regionForeign       = $("#regionForeign").val();
    let blocForeign         = $("#blocForeign").val();
    let etajForeign         = $("#etajForeign").val();
    let scarForeign         = $("#scarForeign").val();
     
    let localityForeign2    = $("#localityForeign2").val();
    let apartmentForeign    = $("#apartmentForeign").val();
    let zipCodeForeign      = $("#zipCodeForeign").val();
 
    let telData             = $("#telData").val();
    let emailData           = $("#emailData").val();
 
    // row
    let fnameCopil          = $("#fnameCopil").val();
    let cetatenieCopil      = $("#cetatenieCopil").val();
    let sexCopil            = $("#sexCopil").val();
 
    let lnameCopil          = $("#lnameCopil").val();
    let idnpCopil           = $("#idnpCopil").val();
    let birthdayCopil       = $("#birthdayCopil").val();
 
    let countryBirthCopil   = $("#countryBirthCopil").val();
    let regionCopil         = $("#regionCopil").val();
    let localityCopil       = $("#localityCopil").val();
     
    // row
    let payMod              = $("#payMod").val();
    let currency            = $("#currency").val();
    let tax                 = $("#tax").val();
    let id_cod_cerere       = $("#id_cod_cerere").text();

    $.ajax({
        type: 'POST',
        url: '../php/update.php',
        data:{

            officeConsul: officeConsul,
            serviceConsul: serviceConsul,

            fname: fname,
            fnameBirth: fnameBirth,
            fnameDad: fnameDad,
            fnameMom: fnameMom,
            idnpMom: idnpMom,
            cetatenie: cetatenie,
            sex: sex,

            lname: lname,
            lnameBirth: lnameBirth,
            lnameDad: lnameDad,
            lnameMom: lnameMom,
            idnpDad: idnpDad,
            idnp: idnp,
            birthday: birthday,

            countryBirth: countryBirth,
            region: region,
            locality: locality,

            checkEmisde: checkEmisde,
            docSerie: docSerie,
            numDoc: numDoc,

            typeDoc: typeDoc,
            emitDate: emitDate,
            expDate: expDate,

            docValid: docValid,
            emisDe: emisDe,

            countryHome: countryHome,
            strHome: strHome,
            numHome: numHome,

            regionHome: regionHome,
            blocHome: blocHome,
            etajHome: etajHome,
            scarHome: scarHome,

            localityForeignHome: localityForeignHome,
            apartmentHome: apartmentHome,
            zipCodeHome: zipCodeHome,

            countryForeign: countryForeign,
            strForeign: strForeign,
            numForeign: numForeign,

            regionForeign: regionForeign,
            blocForeign: blocForeign,
            etajForeign: etajForeign,
            scarForeign: scarForeign,

            localityForeign2: localityForeign2,
            apartmentForeign: apartmentForeign,
            zipCodeForeign: zipCodeForeign,

            telData: telData,
            emailData: emailData,

            fnameCopil: fnameCopil,
            cetatenieCopil: cetatenieCopil,
            sexCopil: sexCopil,

            lnameCopil: lnameCopil,
            idnpCopil: idnpCopil,
            birthdayCopil: birthdayCopil,

            countryBirthCopil: countryBirthCopil,
            regionCopil: regionCopil,
            localityCopil: localityCopil,

            payMod: payMod,
            currency: currency,
            tax: tax,

            id_cod_cerere: id_cod_cerere
        },
        dataType: "json",
        success: function(response){
            if(response.statusCode == 200){
                $('.alert-info').html('SUCCES');
                $('.alert-info').addClass('alert-info--succes');
                location.replace("http://localhost/TEZA%20DE%20AN%20BD/php/dosar.php");
            } else if(response.statusCode == 201){
                $('.alert-info').html('Erroare: Ceva a fost introdusa incorect.');
                $('.alert-info').addClass('alert-info--error');
                $("html, body").animate({ scrollTop: 400 }, "slow");
            } else if(response.statusCode == 204){
                $('.alert-info').html('Erroare: Ceva nu a fost introdus.');
                $('.alert-info').addClass('alert-info--error');
                $("html, body").animate({ scrollTop: 400 }, "slow");
            }
        }
    });
});


// // send data for delete
// let deleteBtn = $('.btn_delete');
// let codeRequest =  $('.code_request');

// for(let i = 0; i < deleteBtn.length; i++) {
//     deleteBtn[i].addEventListener('click', (e) => {
//         let requestDelete = codeRequest[i].innerHTML;

//         e.preventDefault();
//         $('.alert-info').html('');
//         $('.alert-info').removeClass('alert-info--error');
//         $('.alert-info').removeClass('alert-info--succes');

//         $.ajax({
//             type: 'POST',
//             url: '../php/delete.php',
//             data:{
//                 requestDelete: requestDelete
//             },
//             dataType: "json",
//             success: function(response){
//                 if(response.statusCode == 200){
//                     $('.alert-info').html('SUCCES DELETE');
//                     $('.alert-info').addClass('alert-info--succes');
//                     window.scrollTo({top: 0, behavior: 'smooth'});
//                     let delayInMilliseconds = 4000;
//                     setTimeout(function() {
//                         location.reload();
//                     }, delayInMilliseconds);
                    
//                 } else if(response.statusCode == 204){
//                     $('.alert-info').html('Error: Faceti un refresh la pahina');
//                     $('.alert-info').addClass('alert-info--error');
//                 }
//             }
//         })

//     })
// }