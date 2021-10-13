// Search input validate
let headerSearchForm = document.querySelector('#search-form');  // Tìm element id search-form
let searchInput = document.querySelector('#search');            // Tìm element id search
headerSearchForm.addEventListener('submit', function(e) {       
    if (searchInput.value == "") {                              // Nếu người dùng không nhập gì vào input
        e.preventDefault()                                      // Form sẽ không gửi dữ liệu đi
    }
})

let contactForm = document.querySelector('#contact-form');

contactForm.addEventListener('submit', function (event) {
    let fname = document.querySelector('#first-name').value;
    let lname = document.querySelector('#last-name').value;
    let email = document.querySelector('#email').value;
    let subject = document.querySelector('#subject').value;
    let content = document.querySelector('#content').value;
    let err = document.querySelector('#error');
    err.innerText = "";

    let errMessage = 'Vui lòng điền đủ nội dung';

    let isValidated = true;

    if (fname == "") {
        isValidated = false;
        err.innerText = errMessage;
    }

    if (lname == "") {
        isValidated = false;
        err.innerText = errMessage;
    }

    if (email == "") {
        isValidated = false;
        err.innerText = errMessage;
    }

    if (subject == "") {
        isValidated = false;
        err.innerText = errMessage;
    }

    if (content == "") {
        isValidated = false;
        err.innerText = errMessage;
    }

    if (!isValidated) {
        event.preventDefault();
    }
})