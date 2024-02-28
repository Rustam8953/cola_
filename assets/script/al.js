const charList = document.querySelector('.char-list');

window.addEventListener('click',(e) => {
    if(e.target.closest('[add-char]')) {
        const html = `<li class="create-list__item">
            <div>
                <input required type="text" placeholder="Введите название характеристики" name="info_product_name[]">
            </div>
            <div>
                <input required type="text" placeholder="Введите значение характеристики" name="info_product_description[]">
            </div>
        </li>`;
        charList.insertAdjacentHTML('beforeend', html);
    }
})