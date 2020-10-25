//const initOwl 

 //;

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
    name:	'How to Train Your Dragon: The Hidden World	plus',
    genre: `${genre_1}, ${genre_2}, ${genre_6}, ${genre_9}, ${genre_10}`
  },
  {
    start: '12pm - 02pm',
    name:	'	A Dogs Journey	plus',
    genre: `${genre_2}, ${genre_3}, ${genre_5}, ${genre_9}, ${genre_10}`
  } ,
  {
    start: '02pm - 03pm',
    name:	'Intouchables	plus',
    genre: `${genre_3}, ${genre_5}, ${genre_7}`
  },
  {
    start: '03pm - 05pm',
    name:	'Joker',
    genre: `${genre_4}, ${genre_3}, ${genre_8}`
  }
]

/*
const idFilmsStart1 = document.getElementById('idFilmsStart1');
idFilmsStart1.innerHTML = films[0].start;
const idFilmsName1 = document.getElementById('idFilmsName1');
idFilmsName1.innerHTML = films[0].name;
const idjenre1 = document.getElementById('idjenre1');
idjenre1.innerHTML = films[0].genre;

const idFilmsStart2 = document.getElementById('idFilmsStart2');
idFilmsStart2.innerHTML = films[1].start;
const idFilmsName2 = document.getElementById('idFilmsName2');
idFilmsName2.innerHTML = films[1].name;
const idjenre2 = document.getElementById('idjenre2');
idjenre2.innerHTML = films[1].genre;

const idFilmsStart3 = document.getElementById('idFilmsStart3');
idFilmsStart3.innerHTML = films[2].start;
const idFilmsName3 = document.getElementById('idFilmsName3');
idFilmsName3.innerHTML = films[2].name;
const idjenre3 = document.getElementById('idjenre3');
idjenre3.innerHTML = films[2].genre;

const idFilmsStart4 = document.getElementById('idFilmsStart4');
idFilmsStart4.innerHTML = films[3].start;
const idFilmsName4 = document.getElementById('idFilmsName4');
idFilmsName4.innerHTML = films[3].name;
const idjenre4 = document.getElementById('idjenre4');
idjenre4.innerHTML = films[3].genre;*/
// if(document.getElementsByClassName('movie-list__table')[0])
// for (var i = 0; i<4; i++)
// {
//   document.getElementById('idFilmsStart'+(i+1)).innerHTML = films[i].start;
//   document.getElementById('idFilmsName'+(i+1)).innerHTML = films[i].name;
//   document.getElementById('idjenre'+(i+1)).innerHTML = films[i].genre;
// }


const form = document.getElementById('form')
//1var
// form.onsubmit = function(event){
//     event.preventDefault()
//     const name = document.getElementById('nameInput');
//     const pasw = document.getElementById('namePasw');
//     const mail = document.getElementById('nameMail');
//     const check = document.getElementById('nameCheck');
//     const select = document.getElementById('nameSelect');
//     const radio = document.getElementById('r1');
//     const area = document.getElementById('nameArea');
    
// }

//2var
// function formSubmit(){
//   console.log('dfasf')
// }
//3var
// const form = $('#form');
// form.on('onsubmit',function(event){
//   event.preventDefault();
//   console.log('work')
// })

const closePopup = document.getElementById('popup_close');
const closeOpen = document.getElementById('popup_open');
const sendForm = document.getElementById('submit');

const popup = document.getElementById('popup');

closePopup.onclick = function(event){
    event.preventDefault();
    popup.classList.add('hidden');
}
closeOpen.onclick = function(event){
  event.preventDefault();
  popup.classList.remove('hidden');
}

sendForm.onclick = function(event){
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

  selectParent.getElementsByClassName('popup-eror-message')[0].innerHTML  = '';
  agreeParent.getElementsByClassName('popup-eror-message')[0].innerHTML  = '';

 
  if(!checkInput(name.value)){    
    nameParent.classList.add('error');
    nameParent.getElementsByClassName('popup-eror-message')[0].innerHTML = "заполните поле 'Имя'"
  }

  if(!checkInput(telOrder.value)){    
    nameParent.classList.add('error');
    nameParent.getElementsByClassName('popup-eror-message')[0].innerHTML = "заполните поле 'Телефон'"
  }

  if(select.value == 0){    
    selectParent.classList.add('error');
    selectParent.getElementsByClassName('popup-eror-message')[0].innerHTML = "заполните поле выберите ряд"
  }
  if(!agree.checked){    
    agreeParent.classList.add('error');
    agreeParent.getElementsByClassName('popup-eror-message')[0].innerHTML = "Подтвердите согласие"
  }
}

function checkInput(value){
  if (value)
    return true;
  else 
    return false;
}


const url = 'https://kinopoiskapiunofficial.tech/api/v2.1/';

const filmsArr = [
    464963,
    1048334,
    535341,
    775276,
    706655,
    1122114,
    1005878,
    1080513,
    1379016
]
const getAllFilm = function(){
  return new Promise(function(resolve, reject){
      filmsGenerate();
    })
}
const  getFilmById = function(id) {
    return new Promise(function(resolve, reject){
    fetch(`${url}/films/${id}`, {
        headers: {
            'X-API-KEY':'fc7695c5-aa8e-4a51-b2bb-85d54ed28068'
        }
    }).then(response => response.json()).then(resolve)
    })
}




const parseFilm = function (data) {
    data = data.data;
    let countries = '';
    let genres = '';
    //console.log(data)
    data.genres.forEach(function(item){
        genres += `${item.genre} `
    })
    data.countries.forEach(function(item){
        countries += `${item.country} `
    })
    return{
        name: data.nameRu,
        country: countries,
        genre: genres,
        year:data.year,
        description:data.description,
        link:data.posterUrl,
        img:data.webUrl
    }
}




const generateFilmItem = function (name, country,genre, year, description, img, link){
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

function getRandomNumber(min,max) {
  min = Math.ceil(min);
  max = Math.floor(max);
    return Math.floor(Math.random()*(max - min + 1)) + min;
}
let idTr = 0;
const generateFilmTable = function (name, country,genre, year, description, img, link){
  //const time = getRandomNumber(0, 2) + '' 

  let time1, time2, time3, time4, price
  time1 = getRandomNumber (0,2)
  time3 = getRandomNumber (0,5)
  time4 = getRandomNumber (0,9)
  switch (time1){
    case 0:
    case 1:
      time2 = getRandomNumber (0,9)
    default:
      time2 = getRandomNumber (0,3)
    }
  price = getRandomNumber (1,5)*100
  room = getRandomNumber (0,2)

  const hours = `${time1}${time2}:${time3}${time4}`;

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
let filmsGenerate = new  Promise (function(resolve,reject){filmsArr.forEach(function(item){
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
          idTr++
            )
             document.querySelector('#filmsSection').insertAdjacentHTML('beforeEnd', element);
             document.querySelector('.movie-list__table tbody').insertAdjacentHTML('beforeEnd', table);
             countEnterFilm++;
     })
 }) 
 resolve();
})


// filmsGenerate.then(

//       )

let checkerFilm = setTimeout(function tick(){
  if (countEnterFilm == filmsArr.length)
  {
    $(".owl-carousel").owlCarousel({
      nav:true,
      loop:true,
      autoplay:true, 
        smartSpeed:1000, 
        autoplayTimeout:5000, 
        responsive:{ 
            0:{
                items:1
            },
            570:{
                items:2
            },
            850:{
                items:3
            }
        }
    }),
    filmClick()
  }
  else
  {
    checkerFilm = setTimeout(tick,500);
  }
}, 500)

function filmClick(){
  for(i=0;i<document.querySelectorAll("#filmsHire tbody tr").length;i++) {
    document.querySelectorAll("#filmsHire tbody tr")[i].onclick = function(){
      orderForm.style.display = 'block';
      let orderFilmName = document.getElementById('orderFilmName'),
          orderFilmStart = document.getElementById('orderFilmStart'),
          orderFilmGanar = document.getElementById('orderFilmGanar'),
          orderFilmPrice = document.getElementById('orderFilmPrice'),
          orderFilmRoom = document.getElementById('ordeZal'),
          orderFilmGetRoom= getRoom(this.getAttribute('id')),
          orderFilmCountTicket = document.getElementById('orderFilmCountTicket'),
          orderFilmTotalPrice = document.getElementById('orderFilmTotalPrice');
 
      orderFilmName.innerHTML = document.getElementById('orderFilmName_'+i).innerText;
      orderFilmStart.innerHTML = document.getElementById('orderFilmStart_'+i).innerText;
      orderFilmGanar.innerHTML = document.getElementById('orderFilmGanar_'+i).innerText;
      orderFilmPrice.innerHTML = document.getElementById('orderFilmPrice_'+i).innerText;
      orderFilmRoom.innerHTML = orderFilmGetRoom.name;
  
      orderFilmTotalPrice.innerHTML = document.getElementById('orderFilmPrice_'+i).innerText * orderFilmCountTicket.innerText;
  
      orderFilmCountTicket.onchange = function () {
        orderFilmTotalPrice.innerHTML = orderFilmPrice.innerText * orderFilmCountTicket.innerText;
      }

      function changeCount() {
        orderFilmTotalPrice.innerHTML = orderFilmPrice.innerText * orderFilmCountTicket.innerText;
      }

      document.getElementsByClassName('cinema-tickets')[0].innerHTML = '';
      for (let i = 0; i < orderFilmGetRoom.count; ++ i) 
      {
        boughtPlace = '';
        if(getRandomNumber(0,1) == 1)
        {
          boughtPlace = 'bought';
        }
        document.getElementsByClassName('cinema-tickets')[0].innerHTML += `<div data-place = '${i+1}' class="squaere ${boughtPlace}">${i+1}</div>`
        
      }
      console.log(document.getElementsByClassName('squaere').length)
      orderFilmCountTicket.innerHTML = 0;

      for(i = 0; i < document.getElementsByClassName('squaere').length; i++)
      {
        if(!document.getElementsByClassName('squaere')[i].classList.contains('bought'))
        {
          document.getElementsByClassName('squaere')[i].onclick = function()
          { 
            orderForm.getElementsByClassName('tickets-error')[0].getElementsByTagName('p')[0].innerHTML = '';
            this.classList.toggle('placeActive');
            if(this.classList.contains('placeActive'))
              orderFilmCountTicket.innerHTML = +document.getElementById('orderFilmCountTicket').innerText + 1;
            else
              orderFilmCountTicket.innerHTML = +document.getElementById('orderFilmCountTicket').innerText - 1;
              changeCount();
          }
          document.getElementsByClassName('squaere')[i].oncontextmenu = function(){
            alert(`Стоимость билета составляет ${document.getElementById('orderFilmPrice').innerText} рублей`);
          }
        }
        else
        document.getElementsByClassName('squaere')[i].onclick = function(){alert('Место забронировано')}
      }
    }
  }
}



function getRoom(num){
  return rooms.filter(room=>room.id == num)[0]
}

document.getElementsByClassName('menu__burger')[0].onclick = function(){
  if(document.getElementsByClassName('title__nav')[0].style.display == 'block')
    document.getElementsByClassName('title__nav')[0].style.display = 'none';
  else
    document.getElementsByClassName('title__nav')[0].style.display = 'block';
}

document.getElementById('city_name').onclick = cityChangeVis;
document.onclick = function(){
  // console.log(33)
  if ( event.target.className == 'title__main' || 
        event.target.className == 'title__main_header' || 
        event.target.className == 'title__main_text') {
      if(!document.getElementsByClassName('title__city-change')[0].classList.contains('city_name-hidden')){
        document.getElementsByClassName('title__city-change')[0].classList.add('city_name-hidden');
      }
  }
 }
 




  document.getElementById('cityChangeAccess').onclick = function(){
  cityChangeVis();
  city_name.innerHTML = document.querySelector('#cityView span').innerText;
}
document.getElementById('cityChangeNew').onclick = cityChangeNew;


function cityChangeVis(){
  document.getElementsByClassName('title__city-change')[0].classList.toggle('city_name-hidden');
  if(!document.getElementById('cityNew').classList.contains('city_name-hidden')){
    document.getElementById('cityNew').classList.add('city_name-hidden');
  }
  if(document.getElementById('cityView').classList.contains('city_name-hidden')){
    document.getElementById('cityView').classList.remove('city_name-hidden');
  }
  if(document.getElementById('cityChangeAccess').classList.contains('city_name-hidden')){
    document.getElementById('cityChangeAccess').classList.remove('city_name-hidden');
    document.getElementById('cityChangeAccept').classList.add('city_name-hidden');
  }
}
function cityChangeNew(){
  document.getElementById('cityView').classList.toggle('city_name-hidden');
  document.getElementById('cityNew').classList.toggle('city_name-hidden');
  document.getElementById('cityChangeAccept').classList.toggle('city_name-hidden');
  document.getElementById('cityChangeAccess').classList.toggle('city_name-hidden');
}