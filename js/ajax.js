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

jQuery(document).ready(($) => {




    
    getXmlReguest(GEO_API, function(){
        let response = $.parseJSON(this);
        city = response.city.name_ru;
        console.log(city)
        $('#city_name').html(city);
    })
})