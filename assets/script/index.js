const searchBtn = document.querySelector('.nav-search');
const nav = document.querySelector('.nav');
const topArrowBtn = document.querySelector('.arrow');
const inputVal = document.querySelector('.nav-input__value');
const headerBurger = document.querySelector('.header-burger');
const header = document.querySelector('.header');
let search = false;
const searchBox = (el, bool) => {
    return bool == true ? el.classList.add('active')
    : el.classList.remove('active')
}
let menu = false;
let modal = false;
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
                        <img src="/static/${i.image}" alt="" loading=lazy>
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

document.querySelector('.form').addEventListener('submit', (e) => {
    sendForm('form-cons', '/formSend.php')
})

document.querySelector('.modal-box').addEventListener('submit', () => {
    sendForm('form-modal', '/form_modal.php')
})

async function sendForm(formName) {
    const form = document.forms[formName];
    const seqForm = new FormData(form);
    await formSend(seqForm);
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