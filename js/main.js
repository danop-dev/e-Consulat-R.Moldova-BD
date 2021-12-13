function ModalActivity() {
    let links = document.getElementsByClassName('modal__item-link'),
        closeBtn = document.getElementsByClassName('modal-close');

    // Active Modal
    for (let i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function() {
            links[i].nextElementSibling.classList.add('show');
            links[i].nextElementSibling.classList.add('active');
            document.body.style.overflow = "hidden";
        })
    }

    // Disable Modal
    for (let i = 0; i < closeBtn.length; i++) {
        closeBtn[i].addEventListener('click', function() {
            closeBtn[i].parentNode.classList.remove('active');
            closeBtn[i].parentNode.classList.remove('show');
            document.body.style.overflow = ('auto');

        })
    }
}

ModalActivity(); // -> Run