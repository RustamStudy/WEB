
/** Заглушки данных */
const mock = [
    {
        name: "Человек-паук",
        start: "10:00",
        genre: [0, 1, 2],
        filmHire: true,
        filmNew: true,
        description:
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci alias, animi, commodi eius",
        image: "img/mov1.jpg", //для д.з. CA
        fb: "https://fb.com",
        twitter: "https://twitter.com",
        behance: "https://www.behance.net",
        price: 200 
    },
    {
        name: "Собачья жизнь 2",
        start: "12:00",
        genre: [3, 4, 5],
        filmHire: true,
        filmNew: true,
        description:
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci alias, animi, commodi eius",
        image: "img/mov2.jpg", //для д.з. CA
        fb: "https://fb.com",
        twitter: "https://twitter.com",
        behance: "https://www.behance.net",
        price: 300
    },
    {
        name: "История игрушек 4",
        start: "14:00",
        genre: [6, 3, 5],
        filmHire: true,
        filmNew: false,
        description:
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci alias, animi, commodi eius",
        image: "", //для д.з. CA
        fb: "https://fb.com",
        twitter: "https://twitter.com",
        behance: "https://www.behance.net",
        price: 500
    },
    {
        name: "Люди в чёрном: Интернэшнл",
        start: "16:00",
        genre: [0, 1, 5],
        filmHire: true,
        filmNew: true,
        description:
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci alias, animi, commodi eius",
        image: "img/mov3.jpg", //для д.з. CA
        fb: "https://fb.com",
        twitter: "https://twitter.com",
        behance: "https://www.behance.net",
        price: 700
    }
];

//справочник жанров - так часто работают сервисы
const genres = [
    {
        id: 0,
        name: "фантастика"
    },
    {
        id: 1,
        name: "боевик"
    },
    {
        id: 2,
        name: "приключения"
    },
    {
        id: 3,
        name: "фэнтези"
    },
    {
        id: 4,
        name: "драма"
    },
    {
        id: 5,
        name: "комедия"
    },
    {
        id: 6,
        name: "мультфильм"
    }
];

//массивы для хранения отсортированных данных
let filmsNew = [],
    filmsHire = [];

//сортируем на новинки и в прокате
for (let i = 0; i < mock.length; i++) {
    let currentFilm = mock[i];

    if (currentFilm.filmHire) {
        filmsHire.push(currentFilm);
    }

    if (currentFilm.filmNew) {
        filmsNew.push(currentFilm);
    }
}

//объект-обертка для универсализации работы с данными
const film = {
    getName: function() {
        return this.name;
    },

    getStart: function() {
        return this.start;
    },

    getGanre: function() {
        //хранит текущие идентификаторы жанров. Здесь тоже используется this!
        const ganarsIds = this.genre;

        //вспомогательный массив, который будет хранить текстовые описания жанров
        let arrGanars = [];

        //проходим по id шникам жанров
        for (let i = 0; i < ganarsIds.length; i++) {
            let currentId = ganarsIds[i];

            //так делали на лекции
            //arrGanars.push( genres[currentId] );

            //@see https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects/Array/find
            let genreText = genres.find(
                //el содержит текущий элемент перебираемого массива genres
                function(el) {
                    //если условие выполняется, то возвращается проверяемый элемент
                    return el.id == currentId;
                }
            ).name; //элементом genres является объект справочника { id:..., name... }, на этом объекте
            // берем поле name и сохраняем как genreText;

            arrGanars.push(genreText); //добаляем полученный genreText во вспомогательный массив
        }

        //текстовое представление жанров
        //@see https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects/Array/join
        let strGanars = arrGanars.join(", ");
        return strGanars;
    },
    /*getRoom: function(){
        return roomsthis.room;
    },*/
    renderFilmRow() {

        //добавлена строка вывода цены
        let filmName = this.name,
            filmStart = this.start,
            filmGanars = film.getGanre.apply(this),
            filmPrice = this.price;            

            
            filmHTML = `
            <td>
                <input type="checkbox" class="block03__checkbox" id="block03__checkbox1">
                <label for="block03__checkbox1">
                  <i class="icon icon-check" title="check"></i>
                </label>
            </td>
            <td id="start_film_${1}">${filmStart}</td>
            <td id="name_film_${1}">${filmName}</td>
            <td id="ganar_film_${1}">${filmGanars}</td>
            <td id="ganar_prices_${1}">${filmPrice}</td>
          `;
        return filmHTML;
    },

    renderFilmBlock() {
        let filmName = this.name,
            filmImage = this.image,
            filmDescription = this.description,
            filmFb = this.fb,
            filmTw = this.twitter,
            filmBh = this.behance,
            filmHTML = `
            <div class="block05__movie1">
                    <div class="block05__bg">
                        <img src="${filmImage}" alt="">
                    </div>
                    <div class="block05__descr">
                        <div class="block05__text2">${filmName}</div>
                        <div class="block05__sep"></div>
                        <div class="block05__text3">${filmDescription}</div>
                        <div class="block05__linls">
                            <a href="${filmTw}" target="_blank"><i class="icon icon-twitter" title="twitter"></i></a>
                            <a href="${filmFb}" target="_blank"><i class="icon icon-facebook" title="facebook"></i></a>
                            <a href="${filmBh}"><i class="icon icon-camera" title="camera"></i></a>
                        </div>
                    </div>
                </div>
          `;
        return filmHTML;
    },

    //добавлен
    getPrice: function () {
        return this.price
    }
};

//получаем DOM элемент с таблицей
let tableDOM = document.querySelector("#filmsHire tbody");
// for (let i = 0; i < filmsHire.length; i++) {
//     let currentFilm = filmsHire[i],
//         filmName = film.getName.bind(currentFilm)(),
//         filmStart = film.getStart.bind(currentFilm)(),
//         filmGanars = film.getGanre.bind(currentFilm)(),
//         filmPrice = film.getPrice.bind(currentFilm)(),
//         filmRowHTML = film.renderFilmRow.bind(currentFilm)(),
//         tr = document.createElement("tr"); //содаем DOM элемент TR;

//     tr.innerHTML = filmRowHTML; //записываем в DOM элемент HTML разметку

//     //вешаем обработчик события на строку, вызывающий модальное окно
//     /*** РАЗОБРАТЬ */
//     tr.onclick = function () {
//         // 1. Находим элемент с формой заказ
//         // 2. Изменить состояние из display: none -> display: block;
//         // 3. Отобразить данные по бронированию фильма
    
//         orderForm.style.display = 'block';
    
//         let orderFilmName = document.getElementById('orderFilmName'),
//             orderFilmStart = document.getElementById('orderFilmStart'),
//             orderFilmGanar = document.getElementById('orderFilmGanar'),
//             orderFilmPrice = document.getElementById('orderFilmPrice');

//         orderFilmName.innerHTML = filmName;
//         orderFilmStart.innerHTML = filmStart;
//         orderFilmGanar.innerHTML = filmGanars;
//         orderFilmPrice.innerHTML = filmPrice;
    
//         let orderFilmCountTicket = document.getElementById('orderFilmCountTicket'),
//             orderFilmTotalPrice = document.getElementById('orderFilmTotalPrice');
    
//         orderFilmTotalPrice.innerHTML = filmPrice * orderFilmCountTicket.value;
    
//         orderFilmCountTicket.onchange = function () {
//           orderFilmTotalPrice.innerHTML = filmPrice * orderFilmCountTicket.value;
//         }
//     }

//     tableDOM.appendChild(tr); //добавляем в DOM элемент таблицы DOM элемент строки с фильмом
//}

// Закрытие модального окна
/*** РАЗОБРАТЬ Event Handler */
let orderForm = document.getElementById('orderForm');
let closeOrderForm = document.getElementById('closeOrderFrom');

closeOrderForm.onclick = function () {
  orderForm.style.display = 'none';
}
let closeOrderFromSuccess = document.getElementById('closeOrderFromSuccess');

closeOrderFromSuccess.onclick = function () {
    document.getElementById('popup-success').style.display = 'none';
}
// // Валидация ввода имени
// /** РАЗОБРАТЬ Event Handler */
// let sendOrder = document.getElementById('sendOrder');
// sendOrder.onclick = function () {
//   let orderClinetName = document.getElementById('orderClinetName');

//   if (orderClinetName.value) {
//     orderClinetName.style.border = '1px solid #bebebe';
//   } else {
//     orderClinetName.style.border = '2px solid red';
//   }
// }
let ticket = [];

const rooms = [
    {
        id: 0,
        name: 'X',
        count: 10 
    },
    {
        id: 1,
        name: 'L',
        count: 20 
    },
    {
        id: 2,
        name: 'XL',
        count: 30 
    }
];

/*
sendOrder.onclick = function(){

}
*/
function checkCorrectPhoneNumber (number) {
    //  const reg = new RegExp('^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$');
    //  return reg.test(number)
    return true;
}
orderForm.addEventListener('submit', event => {
    const setError = ($el, error)=> {
        $el.parentNode.classList.add('error');
        $el.parentNode.getElementsByClassName('popup-eror-message')[0].innerHTML = error
    }

    event.preventDefault();
    
    const  fields = orderForm.getElementsByTagName('input');

    let error = false;

    const data ={
        name: '',
        phone: '',
        places: []
    }
    for (i=0; i<fields.length-1; i++){
        switch(fields[i].getAttribute('name')){
            case 'nameOrder':
                if(!checkInput(fields[i].value)){    
                    setError(fields[i], 'Заполните поле Имя');
                    error = true;
                    break;
                }
                data.name = fields[i].value;
                break;
            case 'telOrder':
                if(!checkInput(fields[i].value)){    
                    setError(fields[i], 'Заполните поле телефон');
                    error = true;
                    break
                } else {
                    if(!checkCorrectPhoneNumber(fields[i].value)){    
                        setError(fields[i], 'Введите коррекный номер телефона');
                        error = true;
                        break
                    }
                    data.phone = fields[i].value;
                    break;
                }
                break;    
                break;
            dafault:
                console.log('Поле не опознано')
        }

    }
    let places = [];
    if(orderForm.getElementsByClassName('placeActive').length < 1){
        orderForm.getElementsByClassName('tickets-error')[0].getElementsByTagName('p')[0].innerHTML = 'Выберите место'
    }else{
        
        for (let i = 0; i< orderForm.getElementsByClassName('placeActive').length; i++)
        {
            places.push(orderForm.getElementsByClassName('placeActive')[i].getAttribute('data-place'))
        }
        data.places = places;
    }

    if(error){
        return;
    }
    console.log(data)
    sendOrder.setAttribute('disabled','true')
    document.getElementById('fountainG').style.display = 'block';
    let formData = new FormData(orderTicket);
        formData.append('places', places);
        formData.append('fname', orderFilmName.innerText);
        formData.append('ftime', orderFilmStart.innerText);
        formData.append('fzal', ordeZal.innerText);
        formData.append('method', 'post');
    let xhr = new XMLHttpRequest();
    /*let body = 'name=' + nameOrder.value +
                '&phone=' + telOrder.value + 
                '&places=' + places+
                '&file=' + FileList+
                '&file3=' + formData;*/
    //
    //
    //
    //let file = document.getElementById
    //
    //
    //
    xhr.open("POST", '/php2/index.php', true);
    

    //xhr.setRequestHeader('Content-Type', 'multipart/form-data');

    
    console.log(xhr);
    
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4)
        switch(xhr.status)
        {
            case ('200'): case(200):
                {
                    console.log(xhr);
                    let user = JSON.parse(xhr.response);
                    if(xhr.statusText != 'OK'){
                        alert('Указаны не все поля');
                    }
                    else
                    {
                        nameBuyerOrder.innerHTML = `Поздравляем, ${user['name']}!!!`;
                        sendOrder.removeAttribute('disabled')
                        document.getElementById('fountainG').style.display = 'none';
                        orderForm.style.display = 'none';
                        document.getElementById('popup-success').classList.remove('hidden');
                    }
                }
                break;
            case ('500'): case(500):
                alert('Произошла ошибка при обработке данных')
                break;
        }
    };
    xhr.send(formData);
    //xhr.send(body);

    
})
// jQuery(function ($){
//     $('#orderForm form').on('submit', function(e){
//         e.preventDefault();
//         let form = document.forms.orderTicket;
//         let formData = new FormData(form);
//         console.log(formData);
//         $.ajax({
//             url:'/php/serverFile.php',
//             method:'Post',
//             data:formData,
//             success:function(){
//               //  alert('Успешно');
//             },
//             processData: false,
//             contentType: false,
//         })
//     })
// })