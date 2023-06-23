const profile = document.querySelector('nav .profile');
const img = document.querySelector('.image');
const dropDown = document.querySelector('.profile-link');

img.addEventListener('click', ()=>{
    dropDown.classList.toggle('show')
});