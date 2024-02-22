// const pathChange = (categoryId, path) => {
//     document.cookie = "category=" + categoryId + `; path=/catalog`;
//     history.pushState('', '', `/catalog/${path}`);
// }

// const funcIf = (cat, categoryId, path) => {
//     if(window.location.href == window.location.protocol + '//' + window.location.host + `/catalog/${path}` || cat == categoryId) return pathChange(categoryId, `${path}`);
// }

// document.addEventListener("DOMContentLoaded", () => {
//     const category = document.cookie.split('=')[1];
//     funcIf(category, 3, 'vkusno');
//     funcIf(category, 2, 'gaz');
//     funcIf(category, 1, 'kvas');
// })