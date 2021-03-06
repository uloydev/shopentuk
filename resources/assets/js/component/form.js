import {pageUrl} from './../helper-module'

if (pageUrl === '/login') {
    const authPage = document.querySelector('#authPage')
    const formRegister = authPage.querySelector('#form-daftar')
    const formLogin = authPage.querySelector('#form-masuk')

    formRegister.addEventListener('submit', function () {
        localStorage.clear()
        localStorage.setItem('sessionFailed', 'regist')
    }); 

    formLogin.addEventListener('submit', function () {
        localStorage.clear()
        localStorage.setItem('sessionFailed', 'login')
    });

    function removeValidationOnFalseForm(falseForm) {
        const falseErrorMessage = falseForm.querySelectorAll('.error-message')
        const falseErrorInput = falseForm.querySelectorAll('.border-red-400')

        Array.from(falseErrorMessage).map(error => {
            error.remove();
        });
        Array.from(falseErrorInput).map(input => {
            input.value = null;
            input.classList.remove('border-red-400');
        });
    }

    if (localStorage.getItem('sessionFailed') === 'regist') {
        removeValidationOnFalseForm(formLogin)
    } else if (localStorage.getItem('sessionFailed') === 'login') {
        removeValidationOnFalseForm(formRegister)
    }
}

const inputFile = document.querySelectorAll('input[type="file"]')
inputFile.forEach(input => {
    const initLabelText = input.parentElement.querySelector('.file-name').textContent
    input.addEventListener('change', function () {
        if (this.value !== '') {
            this.parentElement.querySelector('.file-name').textContent = this.files[0].name
            
        } else {
            this.parentElement.querySelector('.file-name').textContent = initLabelText
        }
    })
})