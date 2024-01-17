let emailRegEx = /^\w+([.-]?\w+)@(\w+[.-]?).\w{2,3}$/;
let passwordRegEx = /^(?=.[a-z])(?=.[A-Z])(?=.\d).{8,}$/;

let sign_up_form = document.querySelector('.sign-up-form');

sign_up_form.addEventListener('submit', function (event) {
    let email = document.getElementById('email');

    if(!emailRegEx.test(email.value)) {
        event.preventDefault();
        email.classList = "form-control non-valid";
    }

});
