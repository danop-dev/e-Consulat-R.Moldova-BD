$(document).ready(function () {

    //Nav bar animation
    $(window).scroll(function () {
        if (this.scrollY > 20) {
            $('.nav-bar').addClass("nav--toTop");
        } else {
            $('.nav-bar').removeClass("nav--toTop");
        }

    });

    //Modal window action
    function ModalActivity() {
        let links = $('.modal__item-link'),
            closeBtn = $('.modal-close');

        // Active Modal
        for (let i = 0; i < links.length; i++) {
            links[i].addEventListener('click', function () {
                links[i].nextElementSibling.classList.add('show');
                links[i].nextElementSibling.classList.add('active');
                document.body.style.overflow = "hidden";
            })
        }

        // Disable Modal
        for (let i = 0; i < closeBtn.length; i++) {
            closeBtn[i].addEventListener('click', function () {
                closeBtn[i].parentNode.classList.remove('active');
                closeBtn[i].parentNode.classList.remove('show');
                document.body.style.overflow = ('auto');

            })
        }
    }
    ModalActivity(); // -> Run
    
    // $(document).on('click', 'a[href^="#"]', function (event) {
    //     event.preventDefault();

    //     $('html, body').animate({
    //         scrollTop: $( $.attr(this, 'href') ).offset().top
    //     }, 1500);
    // });


    $('#updateBtn').click(function (e) {
        e.preventDefault();
        $('.alert-info').removeClass('alert-info--error');
        $('.alert-info').removeClass('alert-info--succes');
        window.scrollTo({top: 450, behavior: 'smooth'});
        $("input").removeAttr("disabled");

    });

    $("#birthday").datepicker({ dateFormat: 'yy-mm-dd' });
    $("#emitDate").datepicker({ dateFormat: 'yy-mm-dd' });
    $("#expDate").datepicker({ dateFormat: 'yy-mm-dd' });
    $("#birthdayCopil").datepicker({ dateFormat: 'yy-mm-dd' });
    
});