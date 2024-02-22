const searchBtn = document.querySelector('.nav-search');
const nav = document.querySelector('.nav');
const topArrowBtn = document.querySelector('.arrow');
let search = false;
const searchBox = (el, bool) => {
    return bool == true ? el.classList.add('active')
    : el.classList.remove('active')
}

window.addEventListener('click', i => {
    if(search == true && !i.target.closest('.nav-input')) {
        search = false;
        return searchBox(nav, search);
    }
    if(i.target.closest('.nav-search')) {
        search = !search;
        return searchBox(nav, search);
    }
    if(i.target.closest('.arrow')) {
        return document.documentElement.scrollIntoView({behavior: 'smooth', block: 'start'})
    }
    if(i.target.closest('.header-burger')) {
        return document.querySelector('.nav').classList.toggle('active-mobile');
    }
    if(i.target.closest('.product-cat')) {
        const id = i.target.closest('.product-cat').id;
        return document.cookie = "category=" + id + "; path=/catalog";
    }
})

window.addEventListener('scroll', i => {
    if(scrollY > 150) return topArrowBtn.classList.add('active')
    else return topArrowBtn.classList.remove('active');
})

const allPAth = document.querySelectorAll('[path]');
allPAth.forEach(i => i.href + '/' == window.location.href ? i.classList.add('active') : i.classList.remove('active'));