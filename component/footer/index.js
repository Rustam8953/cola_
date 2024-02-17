const footer = document.querySelector('footer');
const htmlFooter = `
<div class="footer-wrap">
    <div class="footer-top">
        <div class="footer-box box">
            <div class="footer-content">
                <div class="footer-logo">
                    <a href="#" class="logo">LOGO</a>
                </div>
                <div class="footer-list">
                    <ul>
                        <li><a href="">Каталог</a></li>
                        <li><a href="">Каталог</a></li>
                        <li><a href="">Каталог</a></li>
                    </ul>
                    <ul>
                        <li><a href="">О нас</a></li>
                        <li><a href="">О нас</a></li>
                        <li><a href="">О нас</a></li>
                    </ul>
                    <ul>
                        <li><a href="">О нас</a></li>
                        <li><a href="">О нас</a></li>
                        <li><a href="">О нас</a></li>
                    </ul>
                </div>
                <ul class="footer-contact">
                    <li class="footer-contact__item">
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <p><span>+7 (953)</span> 784 58 40</p>
                        </a>
                    </li>
                    <li class="footer-contact__item mail">
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p>vkusno@gmail.com</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-box box"><p>2008 - 2024 © ООО «ПО Запсибкола»</p></div>
    </div>
</div>`;
footer.insertAdjacentHTML('beforeend', htmlFooter);