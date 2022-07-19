burger = document.querySelector('.burger')
navbar = document.querySelector('.navbar')
buttons = document.querySelector('.buttons')
navlist = document.querySelector('.nav-items')

burger.addEventListener('click', ()=>{
    navlist.classList.toggle('v-class');
    buttons.classList.toggle('v-class');
    navbar.classList.toggle('h-nav');
})