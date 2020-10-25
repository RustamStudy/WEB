const   GEO_API = 'http://api.sypexgeo.net/',
        CITIES_API = 'https://glavpunkt.ru/api/get_rf_cities';

let city = ''



function getXmlReguest(url, callback){
    let xhr = new XMLHttpRequest();
    sync = true;
    xhr.open('GET', url, sync);
    xhr.onreadystatechange = function(){
        if(xhr.status == '200' && xhr.readyState == '4')
        {
            callback.call(xhr.responseText);
        }
        if(xhr.status != '200'){
            console.log('error');
        }
    }
    xhr.send();       
}
/*
jQuery(($) => {
    $('#city_name').on('click', function(e){
        e.preventDefault();
        $.fancybox.open({
            src : '#choose_city',
            type : 'inline',
        });
        console.log(cities);
        if(!cities){
            getXmlRequest(CITIES_API, function(){
                let cities = $.parseJSON(this)
                console.log(cities)
            })
        }
    })
});
*/
jQuery(document).ready(($) => {
    getXmlReguest(GEO_API, function(){
        let response = $.parseJSON(this);
        city = response.city.name_ru;
        // console.log(city)
        $('#city_name').html(city);
        $('#cityView span').html(city);
    })
})

let sityList = '';
$("#cityListView").on('click', function(){
    if(sityList.length==0){
        getXmlReguest(CITIES_API, function(){
            sityList = $.parseJSON(this);
            // console.log(sityList);
        })
    }
})
$("#cityListView").on('keyup', function(){
    let cityName = document.getElementById('cityListView').value;
    let arr = [];
    
    let listViewFind = document.getElementsByClassName('cityListViewFind')[0];
    listViewFind.innerHTML = '';
    for(let i = 0; i < sityList.length; i++){
        if(sityList[i].name.toUpperCase().indexOf(cityName.toUpperCase())>=0){
            listViewFind.insertAdjacentHTML('beforeEnd', `<p cityName = '${sityList[i].name}'>${sityList[i].name} (${sityList[i].area})</p>`);
        }
    }
    if(listViewFind.innerText.length == 0)
        listViewFind.innerHTML = '<p>-Город не найден-</p>';
    
    let cityListFind = document.querySelectorAll('.cityListViewFind p')
    for(let i = 0; i < cityListFind.length; i++){
        cityListFind[i].onclick = function(){
            if(cityListFind[i].getAttribute('cityName'))
            {
                document.querySelector('#cityView span').innerHTML = this.getAttribute('cityName');
                cityChangeNew()
            }
        }
    }
})