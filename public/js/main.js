// Search input validate
let headerSearchForm = document.querySelector("#search-form"); // Tìm element id search-form
if (headerSearchForm) {
  let searchInput = document.querySelector("#search"); // Tìm element id search
  headerSearchForm.addEventListener("submit", function (e) {
    if (searchInput.value == "") {
      // Nếu người dùng không nhập gì vào input
      e.preventDefault(); // Form sẽ không gửi dữ liệu đi
    }
  });
}

// Contact form validate
let contactForm = document.querySelector("#contact-form");

if (contactForm) {
  contactForm.addEventListener("submit", function (event) {
    let fname = document.querySelector("#first-name").value;
    let lname = document.querySelector("#last-name").value;
    let email = document.querySelector("#email").value;
    let subject = document.querySelector("#subject").value;
    let content = document.querySelector("#content").value;
    let err = document.querySelector("#error");
    err.innerText = "";

    let errMessage = "Vui lòng điền đủ nội dung";

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
  });
}

// Login form validate
let loginForm = document.querySelector("#login-form");

if (loginForm) {
  loginForm.addEventListener("submit", function (e) {
    let username = document.querySelector("#username").value;
    let password = document.querySelector("#password").value;
    let err = document.querySelector("#login-form-err");
    err.innerText = "";

    let isValidated = true;
    let msg = "Vui lòng nhập đủ thông tin";

    if (username == "") {
      isValidated = false;
      err.innerText = msg;
    }

    if (password == "") {
      isValidated = false;
      err.innerText = msg;
    }

    if (!isValidated) {
      e.preventDefault();
    }
  });
}

let postForm = document.querySelector("#post");
if (postForm) {
  postForm.addEventListener("submit", function (e) {
    let title = document.querySelector("#title").value;
    let subtitle = document.querySelector("#subtitle").value;
    let image = document.querySelector("#image").value;
    let main = document.querySelector("#main-paragraph").value;
    let err = document.querySelector('#err');
    err.innerText = "";

    let msg = "Vui lòng nhập đủ thông tin";

    let isValidated = true;

    if (title == "") {
        isValidated = false;
        err.innerText = msg;
    }

    if (subtitle == "") {
        isValidated = false;
        err.innerText = msg;
    }

    if (image == "") {
        isValidated = false;
        err.innerText = msg;
    }

    if (main == "") {
        isValidated = false;
        err.innerText = msg;
    }

    if (!isValidated) {
        e.preventDefault();
    }
  });
}
