'use strict';

const butt = document.querySelectorAll('.item__button'); // Получаем массив всех кнопок.

butt.forEach(function(button) { // Присвоение обработчика клика на всех кнопках.
    button.addEventListener('click', addToBasket);
});

document.querySelector('.basket').addEventListener('click', showBasket);
document.querySelector('.close').addEventListener('click', closeBasket);

function showBasket(){
    if (document.querySelector('.products_of_basket').value == '')  {
        alert ("Корзина пуста.");
    } else {
        const windowBasket = document.querySelector('.basket_window');
        windowBasket.style.display = 'block';

        let products = JSON.parse(document.querySelector('.products_of_basket').value);

        let infoAboutProducts = "<h1>&nbsp;&nbsp;Ваш заказ:</h1><table class='table'><tr align='center'><td><b>№ п/п</b></td><td><b>Наименование товара</b></td><td><b>Цена</b></td><td><b>Кол-во</b></td><td><b>Сумма</b></td></tr>";
        let val = products.all;
        let i=1;
        let fullSumm = 0;
        let fullCount = 0;
        val.forEach(function(element){
            let name = element.name;
            let price = +element.price;
            let count = +element.count;
            let summ = price*count;
            let idProduct = +element.id;
            fullSumm += summ;
            fullCount += count;
            infoAboutProducts+=`<tr align='center'><td>${i}</td><td align='left'>${name}</td><td>${price}</td><td><button data-id='${idProduct}' class="correct_button">+</button>&nbsp;${count}&nbsp;<button data-id='-${idProduct}' class="correct_button">-</button></td><td>${summ}</td></tr>`;
            i++;
        });
        infoAboutProducts+=`<tr align='center'><td colspan="3">ИТОГО:</td><td><b>${fullCount}</b></td><td><b>${fullSumm}</b></td></tr></table>
        <br><br><a href='order.php'>Перейти к оформлению заказа</a>`;
        document.querySelector('.basket_table').innerHTML = infoAboutProducts;

        document.querySelector('.basket').innerHTML = 'Корзина('+fullCount+' товаров)';

        const correct_butt = document.querySelectorAll('.correct_button');
        correct_butt.forEach(function(button) { // Присвоение обработчика клика на всех кнопках увеличения и уменьшения кол-ва товаров.
            button.addEventListener('click', correctCountPosition);
        });
    }
}

function correctCountPosition(even){
    $.ajax({
        type:'POST',
        url: 'correctbasket.php',
        data: 'id='+event.srcElement.dataset.id,
        success:function(data){
            document.querySelector('.products_of_basket').value = data;
            showBasket();
        }
    });
}

function closeBasket(){
    const windowBasket = document.querySelector('.basket_window');
    windowBasket.style.display = 'none';
}

function addToBasket(even){

    $.ajax({
        type:'POST',
        url: 'addbasket.php',
        data: 'id='+event.srcElement.dataset.name,
        success:function(data){

            let infoFromServer = JSON.parse(data);
            //alert(infoFromServer.count);
            //console.dir(infoFromServer);

            if (infoFromServer.count > 0 ) {
                document.querySelector('.basket').innerHTML = 'Корзина('+infoFromServer.count+' товаров)';
                document.querySelector('.products_of_basket').value = data;
                //alert(JSON.parse(infoFromServer.all));
                //console.dir(infoFromServer.all);
            }
            if (infoFromServer.text == 1) {
                alert ("Товар успешно добавлен в корзину. Для завершения заказа нажмите на кнопку 'Корзина'");
            } else {
                alert ("Для оформления заказа необходимо зарегистрироваться на сайте.");
            }
            
        }
    });

}