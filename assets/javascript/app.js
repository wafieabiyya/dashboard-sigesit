const signIn_btn = document.querySelector('#sign-in-button');
const signUp_btn = document.querySelector('#sign-up-button');
const container = document.querySelector('.container');

signUp_btn.addEventListener('click', ()=> {
    container.classList.add('sign-up-active');
});

signIn_btn.addEventListener('click', ()=> {
    container.classList.remove('sign-up-active');
});