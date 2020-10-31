const genre_1 = 'мультфильм';
const genre_2 = 'фэнтези';
const genre_3 = 'драма';
const genre_4 = 'триллер';
const genre_5 = 'комедия';
const genre_6 = 'боевик';
const genre_7 = 'биография';
const genre_8 = 'криминал';
const genre_9 = 'приключения';
const genre_10 = 'семейный';

let countEnterFilm = 0

const films = [
    {
        start: '10am - 12pm',
        name: 'How to Train Your Dragon: The Hidden World	plus',
        genre: `${genre_1}, ${genre_2}, ${genre_6}, ${genre_9}, ${genre_10}`
    },
    {
        start: '12pm - 02pm',
        name: '	A Dogs Journey	plus',
        genre: `${genre_2}, ${genre_3}, ${genre_5}, ${genre_9}, ${genre_10}`
    },
    {
        start: '02pm - 03pm',
        name: 'Intouchables	plus',
        genre: `${genre_3}, ${genre_5}, ${genre_7}`
    },
    {
        start: '03pm - 05pm',
        name: 'Joker',
        genre: `${genre_4}, ${genre_3}, ${genre_8}`
    }
]

const form = document.getElementById('form')
const closePopup = document.getElementById('popup_close');
const closeOpen = document.getElementById('popup_open');
const sendForm = document.getElementById('submit');

const popup = document.getElementById('popup');

closePopup.onclick = function (event) {
    event.preventDefault();
    popup.classList.add('hidden');
}
closeOpen.onclick = function (event) {
    event.preventDefault();
    popup.classList.remove('hidden');
}

sendForm.onclick = function (event) {
    event.preventDefault();


    let name = document.getElementById('nameInput');
    let select = document.getElementById('nameSelect');
    let agree = document.getElementById('persAccess');
    let telOrder = document.getElementById('telOrder');


    let nameParent = name.parentNode;
    let selectParent = select.parentNode;
    let agreeParent = agree.parentNode;

    nameParent.classList.remove('error');
    telOrder.classList.remove('error');


    selectParent.classList.remove('error');
    agreeParent.classList.remove('error');
    nameParent.getElementsByClassName('popup-eror-message')[0].innerHTML = '';
    telOrder.getElementsByClassName('popup-eror-message')[0].innerHTML = '';

    selectParent.getElementsByClassName('popup-eror-message')[0].innerHTML = '';
    agreeParent.getElementsByClassName('popup-eror-message')[0].innerHTML = '';


    if (!checkInput(name.value)) {
        nameParent.classList.add('error');
        nameParent.getElementsByClassName('popup-eror-message')[0].innerHTML = "заполните поле 'Имя'"
    }

    if (!checkInput(telOrder.value)) {
        nameParent.classList.add('error');
        nameParent.getElementsByClassName('popup-eror-message')[0].innerHTML = "заполните поле 'Телефон'"
    }

    if (select.value == 0) {
        selectParent.classList.add('error');
        selectParent.getElementsByClassName('popup-eror-message')[0].innerHTML = "заполните поле выберите ряд"
    }
    if (!agree.checked) {
        agreeParent.classList.add('error');
        agreeParent.getElementsByClassName('popup-eror-message')[0].innerHTML = "Подтвердите согласие"
    }
}

function checkInput(value) {
    if (value)
        return true;
    else
        return false;
}


const url = 'https://kinopoiskapiunofficial.tech/api/v2.1/';

let xhr = new XMLHttpRequest();
body = "name:getFilmList";
xhr.open("POST", '/php2/index.php', true);
xhr.send(body);

const filmArr = [
    {
        "filmId": 464963,
        "time": "11:00",
        "room": 0,
        "price": 300
    },
    {
        "filmId": 1048334,
        "time": "12:00",
        "room": 1,
        "price": 800
    },
    {
        "filmId": 535341,
        "time": "18:00",
        "room": 1,
        "price": 500
    },
    {
        "filmId": 775276,
        "time": "16:00",
        "room": 2,
        "price": 300
    },
    {
        "filmId": 706655,
        "time": "13:00",
        "room": 1,
        "price": 800
    },
    {
        "filmId": 1122114,
        "time": "15:00",
        "room": 1,
        "price": 500
    },
    {
        "filmId": 1005878,
        "time": "17:00",
        "room": 0,
        "price": 300
    },
    {
        "filmId": 1080513,
        "time": "14:00",
        "room": 2,
        "price": 800
    },
    {
        "filmId": 1379016,
        "time": "17:00",
        "room": 1,
        "price": 500
    }
]

let filmsArr = [];
for (let i = 0; i < filmArr.length; i++) {
    filmsArr.push(filmArr[i].filmId);
}

const getAllFilm = function () {
    return new Promise(function (resolve, reject) {
        filmsGenerate();
    })
}
const getFilmById = function (id) {
    return new Promise(function (resolve, reject) {
        fetch(`${url}/films/${id}`, {
            headers: {
                'X-API-KEY': 'fc7695c5-aa8e-4a51-b2bb-85d54ed28068'
            }
        }).then(response => response.json()).then(resolve)
    })
}

const parseFilm = function (data) {
    data = data.data;
    let countries = '';
    let genres = '';
    //sconsole.log(data)
    data.genres.forEach(function (item) {
        genres += `${item.genre} `
    })
    data.countries.forEach(function (item) {
        countries += `${item.country} `
    })
    return {
        name: data.nameRu,
        country: countries,
        genre: genres,
        year: data.year,
        description: data.description,
        link: data.posterUrl,
        img: data.webUrl,
        smallImg: data.posterUrlPreview,
        filmId: data.filmId
    }
}

const generateFilmItem = function (name, country, genre, year, description, img, link) {
    return `
            <div class="movie-poster__div movie-poster__div11">
                <a class="movie-poster__div-link" target = "_blank" href="${link}">
                    <img class="movie-poster__div-link-img" title="${name}" src="${img}" alt="img11"/>  
                </a>
                <div class = "movie-poster-div-obout">
                    <a target = "_blank" href="${link}" class = "movie-poster-div-obout__header">${name}</a>
                    <div class = "movie-poster-div-obout__line"></div>
                    <p class = "movie-poster-div-obout__text">${description.substr(0, 100)}...</p>
                    <div class = "movie-poster-div-obout-array">
                        <a  class = "movie-poster-div-obout-array__link" href="">
                            <img class = "movie-poster-div-obout-array__link-img" src="img/facebookIco.png" alt="">
                        </a>
                        <a  class = "movie-poster-div-obout-array__link" href="">
                            <img class = "movie-poster-div-obout-array__link-img" src="img/twitterIco.png" alt="">
                        </a>
                        <a  class = "movie-poster-div-obout-array__link" href="">
                            <img class = "movie-poster-div-obout-array__link-img" src="img/behanceIco.png" alt="">
                        </a>
                        <a  class = "movie-poster-div-obout-array__link" href="">
                            <img class = "movie-poster-div-obout-array__link-img" src="img/dribbbleIco.png" alt="">
                        </a>
                    </div>
                </div>
    
            </div>`

}

function getRandomNumber(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
let idTr = 0;
let filmTable = [];
let idFilmArr = 0;
const generateFilmTable = function (name, country, genre, year, description, img, link, smallImg, filmId) {
    let time1, time2, time3, time4, price
    time1 = getRandomNumber(0, 2)
    time3 = getRandomNumber(0, 5)
    time4 = getRandomNumber(0, 9)
    switch (time1) {
        case 0:
        case 1:
            time2 = getRandomNumber(0, 9)
        default:
            time2 = getRandomNumber(0, 3)
    }
    price = getRandomNumber(1, 5) * 100
    room = getRandomNumber(0, 2)

    const hours = `${time1}${time2}:${time3}${time4}`;

    filmTable.push(
        {
            "filmStart": filmArr[idFilmArr].time,
            "filmName": name,
            "genre": genre,
            "price": filmArr[idFilmArr].price,
            "room": filmArr[idFilmArr].room,
            "year": year,
            "country": country,
            "img": img,
            "description": description,
            "filmId": filmArr[idFilmArr].filmId
        }
    )
    idFilmArr++;
    return `
          <tr id = ${room}>
            <td id = 'orderFilmStart_${idTr}'>${hours}</td>
            <td id = 'orderFilmName_${idTr}'>
                <a target = "_blank" href="${link}">${name}</a>
            </td>
            <td id = 'orderFilmGanar_${idTr}'>${genre}</td>
            <td id = 'orderFilmPrice_${idTr}'>${price}</td>
            <td id = 'orderFilmRoom_${idTr}'>${room}</td>
           
          </tr>
        `

}
let element, table, prepareFilm;
let filmsGenerate = new Promise(function (resolve, reject) {
    filmsArr.forEach(function (item) {
        let film = getFilmById(item);
        film.then(result => {
            prepareFilm = parseFilm(result);
            element = generateFilmItem(prepareFilm.name,
                prepareFilm.country,
                prepareFilm.genre,
                prepareFilm.year,
                prepareFilm.description,
                prepareFilm.link,
                prepareFilm.img
            )
            table = generateFilmTable(prepareFilm.name,
                prepareFilm.country,
                prepareFilm.genre,
                prepareFilm.year,
                prepareFilm.description,
                prepareFilm.link,
                prepareFilm.img,
                prepareFilm.filmId,
                idTr++
            )
            document.querySelector('#filmsSection').insertAdjacentHTML('beforeEnd', element);
            countEnterFilm++;
        })
    })
    resolve();
})
let filmTableNew
function tableReload(field, typeSort) {
    filmTableNew = filmTableOrderFunction(field, typeSort)
    let tableBody = document.getElementById('filmsHire').getElementsByTagName('tbody')[0];
    tableBody.innerHTML = '';
    elem = '';
    for (let i = 0; i < filmTableNew.length; i++) {
        elem += `<tr idFilm = '${filmTableNew[i].filmId}'>`;
        elem += `<td><img src = 'img/check.png' class = 'movie-list__table_ch_box'></td>`;
        elem += `<td>${filmTableNew[i].filmStart}</td>`;
        elem += `<td><img class = 'movie-list__table_img' src = '${filmTableNew[i].img}'><span>${filmTableNew[i].filmName}</span></td>`;
        elem += `<td>${filmTableNew[i].year}</td>`;
        elem += `<td>${filmTableNew[i].genre}</td>`;
        elem += '</tr>';
    }
    tableBody.insertAdjacentHTML('beforeEnd', elem)
}
let s = setTimeout(function tick() {
    if (countEnterFilm == filmsArr.length) {
        $(".owl-carousel").owlCarousel({
            nav: true,
            loop: true,
            autoplay: true,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                570: {
                    items: 2
                },
                850: {
                    items: 3
                }
            }
        }),
            tableReload('filmName', 'asc');
        sortedTable();
        filmClick()
        //console.log(filmTable);
    }
    else {
        checkerFilm = setTimeout(tick, 1000);
    }

}, 1000)
let arr
function filmClick() {
    for (i = 0; i < document.querySelectorAll("#filmsHire tbody tr").length; i++) {
        document.querySelectorAll("#filmsHire tbody tr")[i].onclick = function () {

            let idInd = 0;
            for (let j = 0; j < filmTable.length; j++) {
                if (filmTable[j].filmId == this.getAttribute('idFilm')) idInd = j;

            }
            //console.log(filmTable[idInd]);
            orderForm.style.display = 'block';
            let orderFilmName = document.getElementById('orderFilmName'),
                orderFilmStart = document.getElementById('orderFilmStart'),
                orderFilmGanar = document.getElementById('orderFilmGanar'),
                orderFilmPrice = document.getElementById('orderFilmPrice'),
                orderFilmRoom = document.getElementById('ordeZal'),
                orderFilmCountTicket = document.getElementById('orderFilmCountTicket'),
                orderFilmTotalPrice = document.getElementById('orderFilmTotalPrice');

            orderFilmName.innerHTML = filmTable[idInd].filmName;
            orderFilmStart.innerHTML = filmTable[idInd].filmStart;
            orderFilmGanar.innerHTML = filmTable[idInd].genre;
            orderFilmPrice.innerHTML = filmTable[idInd].price;
            orderFilmRoom.innerHTML = getRoom(filmTable[idInd].room).name;
            document.getElementsByClassName('cinema-tickets')[0].innerHTML = '<p>Пожалуйста подождите, загружаются места в зале</p>';
            orderFilmTotalPrice.innerHTML = filmTable[idInd].price * orderFilmCountTicket.innerText;

            orderFilmCountTicket.onchange = function () {
                orderFilmTotalPrice.innerHTML = orderFilmPrice.innerText * orderFilmCountTicket.innerText;
            }

            function changeCount() {
                orderFilmTotalPrice.innerHTML = orderFilmPrice.innerText * orderFilmCountTicket.innerText;
            }


            $.post(
                "./php2/index.php",
                {
                    method: "places",
                    id1: filmTable[idInd].filmName
                },
                function (data) {
                    arr = eval('(' + data + ')');
                    document.getElementsByClassName('cinema-tickets')[0].innerHTML = ''
                    for (let i = 0; i < getRoom(filmTable[idInd].room).count; i++) {
                        boughtPlace = '';
                        for (let j = 0; j < arr.length; j++) {
                            if (i == (arr[j] - 1)) {
                                boughtPlace = 'bought';
                                // console.log(j);
                            }
                        }
                        document.getElementsByClassName('cinema-tickets')[0].innerHTML += `<div data-place = '${i + 1}' class="squaere ${boughtPlace}">${i + 1}</div>`
                    }
                    // console.log(arr);
                    orderFilmCountTicket.innerHTML = 0;

                    for (i = 0; i < document.getElementsByClassName('squaere').length; i++) {
                        if (!document.getElementsByClassName('squaere')[i].classList.contains('bought')) {
                            document.getElementsByClassName('squaere')[i].onclick = function () {
                                orderForm.getElementsByClassName('tickets-error')[0].getElementsByTagName('p')[0].innerHTML = '';
                                this.classList.toggle('placeActive');
                                if (this.classList.contains('placeActive'))
                                    orderFilmCountTicket.innerHTML = +document.getElementById('orderFilmCountTicket').innerText + 1;
                                else
                                    orderFilmCountTicket.innerHTML = +document.getElementById('orderFilmCountTicket').innerText - 1;
                                changeCount();
                            }
                            document.getElementsByClassName('squaere')[i].oncontextmenu = function () {
                                alert(`Стоимость билета составляет ${document.getElementById('orderFilmPrice').innerText} рублей`);
                            }
                        }
                        else
                            document.getElementsByClassName('squaere')[i].onclick = function () { alert('Место забронировано') }
                    }
                }
            )
        }
    }
}



function getRoom(num) {
    return rooms.filter(room => room.id == num)[0]
}

document.getElementsByClassName('menu__burger')[0].onclick = function () {
    if (document.getElementsByClassName('title__nav')[0].style.display == 'block')
        document.getElementsByClassName('title__nav')[0].style.display = 'none';
    else
        document.getElementsByClassName('title__nav')[0].style.display = 'block';
}

document.getElementById('city_name').onclick = cityChangeVis;
document.onclick = function () {
    // console.log(33)
    if (event.target.className == 'title__main' ||
        event.target.className == 'title__main_header' ||
        event.target.className == 'title__main_text') {
        if (!document.getElementsByClassName('title__city-change')[0].classList.contains('city_name-hidden')) {
            document.getElementsByClassName('title__city-change')[0].classList.add('city_name-hidden');
        }
    }
}





document.getElementById('cityChangeAccess').onclick = function () {
    cityChangeVis();
    city_name.innerHTML = document.querySelector('#cityView span').innerText;
}
document.getElementById('cityChangeNew').onclick = cityChangeNew;


function cityChangeVis() {
    document.getElementsByClassName('title__city-change')[0].classList.toggle('city_name-hidden');
    if (!document.getElementById('cityNew').classList.contains('city_name-hidden')) {
        document.getElementById('cityNew').classList.add('city_name-hidden');
    }
    if (document.getElementById('cityView').classList.contains('city_name-hidden')) {
        document.getElementById('cityView').classList.remove('city_name-hidden');
    }
    if (document.getElementById('cityChangeAccess').classList.contains('city_name-hidden')) {
        document.getElementById('cityChangeAccess').classList.remove('city_name-hidden');
        document.getElementById('cityChangeAccept').classList.add('city_name-hidden');
    }
}
function cityChangeNew() {
    document.getElementById('cityView').classList.toggle('city_name-hidden');
    document.getElementById('cityNew').classList.toggle('city_name-hidden');
    document.getElementById('cityChangeAccept').classList.toggle('city_name-hidden');
    document.getElementById('cityChangeAccess').classList.toggle('city_name-hidden');
}

document.getElementById('closeOrderFromSuccessRoom').onclick = function () {
    document.getElementById('popup-success-room').classList.add('hidden');
}
document.getElementById('intererView').onclick = function () {
    document.getElementById('popup-success-room').classList.remove('hidden');
}

let filmTableOrder = [];
function filmTableOrderFunction(field, typeSort) {
    switch (field) {
        case 'filmStart': {
            switch (typeSort) {
                case 'asc': {
                    filmTableOrder = filmTable.sort((a, b) => a.filmStart > b.filmStart ? 1 : -1);
                    break;
                }
                case 'desc': {
                    filmTableOrder = filmTable.sort((a, b) => a.filmStart > b.filmStart ? -1 : 1);
                    break;
                }
            }
            break;
        }
        case 'filmName': {
            switch (typeSort) {
                case 'asc': {
                    filmTableOrder = filmTable.sort((a, b) => a.filmName > b.filmName ? 1 : -1);
                    break;
                }
                case 'desc': {
                    filmTableOrder = filmTable.sort((a, b) => a.filmName > b.filmName ? -1 : 1);
                    break;
                }
            }
            break;
        }
    }
    return filmTableOrder;
}
let arrField = ['filmStart', 'filmName'];
function sortedTable() {
    let th = document.getElementsByClassName('poiner')
    for (let i = 0; i < th.length; i++) {

        th[i].parentElement.onclick = () => {
            let cl = 'desc'
            if (!th[i].classList.contains('asc')) {
                tableReload(arrField[i], 'asc');
                cl = 'asc';
            }
            else {
                tableReload(arrField[i], 'desc');
            }

            for (let j = 0; j < th.length; j++) {
                th[j].parentElement.getElementsByTagName('div')[0].classList.remove('asc');
                th[j].parentElement.getElementsByTagName('div')[0].classList.remove('desc');
            }

            th[i].classList.add(cl);

        }
    }
}