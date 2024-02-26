const searchBtn = document.querySelector('.nav-search');
const nav = document.querySelector('.nav');
const topArrowBtn = document.querySelector('.arrow');
const inputVal = document.querySelector('.nav-input__value');
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
allPAth.forEach(i => {
    if(i.href + '/' == window.location.href) {
        i.classList.add('active')
        if(i.closest('ul').previousElementSibling) {
            i.closest('ul').previousElementSibling.classList.add('active')
        }
    } else {
        i.classList.remove('active')
    }
})

const i = document.getElementById('search-input');

i.addEventListener('input', () => {
    inputVal.innerHTML = '';
    fetch('http://localhost:8080/search.php', {
        method: "POST",
        body: JSON.stringify({
            dataName: i.value
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.length > 0) {
            inputVal.classList.add('active');
            data.forEach(i => {
                const html = `
                <li class="nav-product">
                    <div class="nav-product__img">
                        <img src="/static/${i.image}.png" alt="" loading=lazy>
                    </div>
                    <a href="/product/?id=${i.id}">${i.name}</a>
                </li>`;
                inputVal.insertAdjacentHTML('beforeend', html);
            })
        }
    })
    .catch(error => console.log(error))
})