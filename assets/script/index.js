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
})

window.addEventListener('scroll', i => {
    if(scrollY > 260) return topArrowBtn.classList.add('active')
    else return topArrowBtn.classList.remove('active');
})