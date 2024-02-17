const node = document.querySelector('header');
const html = `
<div class="header-box box">
    <div class="header-content">
        <div class="header-top">
            <a href="" class="logo">LOGO</a>
            <div class="header-contact">
                <div class="header-contact__l">
                    <a href="tel:89537845840"><i class="fa fa-phone" aria-hidden="true"></i></a>
                    <a href="mailto:example@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                </div>
                <div class="header-contact__r">
                    <button class="v-1">консультация</button>
                </div>
            </div>
        </div>
        <nav class="nav">
            <ul class="nav-list">
                <li class="dropdown nav-item">
                    <a href="/catalog" class="nav-item__title">
                        о нас
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="/about">Краткая информация</a></li>
                        <li><a href="/about">Краткая информация</a></li>
                        <li><a href="/about">Краткая информация</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="/catalog" class="nav-item__title">
                        каталог
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="/about">Краткая информация</a></li>
                        <li><a href="/about">Краткая информация</a></li>
                        <li><a href="/about">Краткая информация</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="/catalog" class="nav-item__title">
                        партнерам
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="/about">Стать партнером</a></li>
                        <li><a href="/about">Краткая информация</a></li>
                        <li><a href="/about">Краткая информация</a></li>
                    </ul>
                </li>
            </ul>
            <div class="nav-input">
                <div class="nav-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
                <div class="nav-input__item">
                    <input type="text" placeholder="Введите название товара">
                </div>
            </div>
        </nav>
    </div>
</div>`;
node.insertAdjacentHTML('beforeend', html);