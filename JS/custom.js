const initOwl = function(){
  $(".owl-carousel").owlCarousel({
    nav:true
  });
}

$(document).ready(initOwl);

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
for (var i = 0; i<4; i++)
{
  document.getElementById('idFilmsStart'+(i+1)).innerHTML = films[i].start;
  document.getElementById('idFilmsName'+(i+1)).innerHTML = films[i].name;
  document.getElementById('idjenre'+(i+1)).innerHTML = films[i].genre;
}
