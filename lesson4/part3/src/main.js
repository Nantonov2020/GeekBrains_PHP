'use strict';
const img = document.querySelectorAll('.img'); // Получаем массив всех картинок.

img.forEach(function(button) { // Присвоение обработчика клика на всех картинках.
    button.addEventListener('click', imgClickHandler);
});

function imgClickHandler(event) {
    const nameImg = event.srcElement.dataset.name;
    document.querySelector('.show_img').style.display = "block";
    const elem = document.querySelector('.big_img');
    elem.attributes.src.nodeValue = "img/" + nameImg;
}

document.querySelector('.close_img').addEventListener('click', closeWinwowImg);

function closeWinwowImg(){
    document.querySelector('.show_img').style.display = "none";
}
