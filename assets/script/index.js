const searchBtn = document.querySelector('.nav-search');
const nav = document.querySelector('.nav');
const topArrowBtn = document.querySelector('.arrow');
const inputVal = document.querySelector('.nav-input__value');
const headerBurger = document.querySelector('.header-burger');
const header = document.querySelector('.header');
const navItem = document.querySelectorAll('.nav-item');
let search = false;
const searchBox = (el, bool) => {
    return bool == true ? el.classList.add('active')
    : el.classList.remove('active')
}
let menu = false;
let modal = false;
let productModalState = false;
headerFix();

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
    if(i.target.closest('.product-cat')) {
        const id = i.target.closest('.product-cat').id;
        return document.cookie = "category=" + id + "; path=/catalog";
    }
    if(i.target.closest('[modal]')) {
        modal = true;
        stateLogic(modal, document.querySelector('.modal'), 'active')
    }
    if(i.target.closest('[modal-close]')) {
        modal=false;
        stateLogic(modal, document.querySelector('.modal'), 'active')
    }
    if(i.target.closest('[menu]')) {
        menu = !menu;
        menuLogic(menu, nav, 'active-mobile');
    }
    if(i.target.closest('[modal-product]')) {
        productModalState = true;
        menuLogic(productModalState, document.querySelector('.product-modal'), 'active');
    }
    if(i.target.closest('[modal-product-close]')) {
        productModalState = false;
        menuLogic(productModalState, document.querySelector('.product-modal'), 'active');
    }
    if(screen.width < 800) {
        allArrClear(navItem);
        return i.target.closest('.nav-item') ? i.target.closest('.nav-item').classList.add('active') : allArrClear(navItem);
    }
})

window.addEventListener('scroll', i => {

    if(scrollY > 150) topArrowBtn.classList.add('active')
    else topArrowBtn.classList.remove('active');

    headerFix();

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
    console.log(i.value);
    fetch('http://localhost:8080/search.php', {
        method: "POST",
        body: JSON.stringify({
            dataName: i.value
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if(data.length > 0) {
            inputVal.classList.add('active');
            data.forEach(i => {
                const html = `
                <li class="nav-product">
                    <div class="nav-product__img">
                        <img src="${i.image !== "" ? '/static/' + i.image : '/assets/img/logo/none2.png'}" alt="" loading=lazy>
                    </div>
                    <a href="/product/?id=${i.id}">${i.name}</a>
                </li>`;
                inputVal.insertAdjacentHTML('beforeend', html);
            })
        }
    })
    .catch(error => console.log(error))
})

function stateLogic(state, m, className) {
    if(state == true) {
        m.classList.add(className);
        document.body.classList.add('stuck');
    } else {
        m.classList.remove(className);
        document.body.classList.remove('stuck');
    }
}

function menuLogic(state, m, className) {
    if(state == true) {
        m.classList.add(className);
        headerBurger.classList.add('active');
        document.body.classList.add('stuck');
    } else {
        m.classList.remove(className);
        headerBurger.classList.remove('active');
        document.body.classList.remove('stuck');
    }
}

const form = document.querySelector('.form');
const modalBox = document.querySelector('.modal-box');
const productModal = document.querySelector('.product-modal__box');

if(form) {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        sendForm('form-cons', "http://localhost:8080/form_product.php")
    })
}
if(modalBox) {
    modalBox.addEventListener('submit', (e) => {
    e.preventDefault();
        sendForm('form-modal', "http://localhost:8080/form_product.php")
    })
}
if(productModal) {
    productModal.addEventListener('submit', (e) => {
        e.preventDefault();
        sendForm('product-form', "http://localhost:8080/form_product.php")
    })
}

async function sendForm(formName, pathName) {
    const form = document.forms[formName];
    console.log(form)
    const seqForm = new FormData(form);
    await formSend(seqForm, pathName);
    form.reset();
}

async function formSend(bodyForm, path) {
    return await fetch(path, {
        method: 'POST',
        body: bodyForm
    })
}

function headerFix() {
    if(screen.width > 800) {
        if(window.pageYOffset > 130) {
            header.classList.add('fix', 'time');
            setTimeout(() => {
                header.classList.add('stack');
            }, 100);
            document.body.style.marginTop = '116px';
        }
        else {
            header.classList.remove('fix', 'time', 'stack');
            document.body.style.marginTop = '0px';
        }
    }
}

function allArrClear(arr) {
    arr.forEach(i => i.classList.remove('active'));
}