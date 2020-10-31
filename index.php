<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Киношка</title>
    <link rel="stylesheet" href="fonts/Roboto/stylesheet.css">
    <link rel="stylesheet" href="css/reset.css?v=08.08.2020">
    <link rel="stylesheet" href="css/main.css?v=08.08.2020">
    <link rel="stylesheet" href="js/plagins/owlcarusel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="js/plagins/owlcarusel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="js/plagins/owlcarusel/css/style.css">
    <link rel="stylesheet" href="calculator/style.css">
    <link rel="stylesheet" href="css/media.css?v=08.08.2020">
    <link rel="stylesheet" href="css/loader.css">
</head>

<body>

    <div class="title">
        <div class="container">
            <header>
                <div class="title-logo">
                    <a class="title-logo__img" target="_blank" href="http://university.innopolis.ru"></a>
                </div>
                <div class="menu__wrap">
                    <div class="menu__burger">
                        <span>

                        </span>
                    </div>
                </div>
                <ul class="title__nav">
                    <li>
                        <a href="#">event details</a>
                    </li>
                    <li>
                        <a href="#">speakers</a>
                    </li>
                    <li>
                        <a href="#">sponsors</a>
                    </li>
                    <li>
                        <a href="#">past events</a>
                    </li>
                    <li>
                        <a href="#">contact</a>
                    </li>
                </ul>
                <div class="title__city">
                    <p>Ваш город: <span id="city_name">-не определено-</span></p>
                    <div class="title__city-change city_name-hidden">
                        <h3 id='cityView'>Ваш город: <span>-не определено-</span></h3>
                        <div id="cityNew" class="city_name-hidden">
                            <h3 id='cityViewNew'>Введите Ваш город:</h3>
                            <input id='cityListView' type="text" placeholder="Начните вводить название Вашего города" />
                            <div class="cityListViewFind"></div>
                        </div>
                        <div class="title__city-change_button">
                            <button class="present__button" id="cityChangeAccess">Верно</button>
                            <button class="present__button city_name-hidden" id="cityChangeAccept">Выбрать</button>
                            <button class="present__button" id="cityChangeNew">Не верно</button>

                        </div>
                    </div>
                </div>
            </header>

            <div class="title__main">
                <h1 class="title__main_header">Закажите билет в кино</h1>
                <h2 class="title__main_text">Всем покупателям подарок!</h2>
            </div>

        </div>
    </div>
    <div class="ordered">
        <div class="container">
            <div class="ordered-welcome">
                <h3 class="ordered-welcome__header">Добро пожаловать!</h3>
                <p class="ordered-welcome__text">Cumque dolorem eum harum laudantium libero molestias saepe soluta? Facere minima optio perferendis quibusdam quis reprehenderit, saepe! Debitis enim optio saepe voluptatibus.</p>
                <p class="ordered-welcome__text">
                    Cumque dolorem eum harum laudantium libero molestias saepe soluta? Facere minima optio perferendis quibusdam quis reprehenderit, saepe! Debitis enim optio saepe voluptatibus.
                </p>
            </div>
            <div class="ordered-header">
                <h3 class="ordered-header__title">Почему мы?</h3>
            </div>
            <section class="ordered-section">
                <article class="ordered-section-article">
                    <div class="ordered-secttion-img">
                        <img class="ordered-section__img" src="img/b2_icon_1.jpg" alt="b2_icon_1" />
                    </div>
                    <h4 class="ordered-section__header">Большие экраны</h4>
                    <p class="ordered-section__header-about">Meet the Community you’ve always talked with, in real life! This meetup will be all about authors engaging each other with interesting coversation and topics. We will have loads of fun.<p>
                </article>
                <article class="ordered-section-article">
                    <div class="ordered-secttion-img">
                        <img class="ordered-section__img" src="img/b2_icon_2.jpg" alt="b2_icon_2" />
                    </div>
                    <h4 class="ordered-section__header">Объемный звук</h4>
                    <p class="ordered-section__header-about">In this meetup you will get to know the marketplaces better, because that’s why were all here for right? Learn a few tips and tricks from experienced authors from all over the country.</p>
                </article>
                <article class="ordered-section-article">
                    <div class="ordered-secttion-img" title="Нажмите, чтобы увидеть интерьер" id="intererView">
                        <img class="ordered-section__img" src="img/b2_icon_3.jpg" alt="b2_icon_3" />
                    </div>
                    <h4 class="ordered-section__header">Удобные кресла</h4>
                    <p class="ordered-section__header-about">
                        Gather round fellow authors!
                        <br />
                        Hear the stories of success from your favorite authors and learn how they we able to tackle their problems and become successful.
                    </p>
                </article>
            </section>
        </div>
    </div>
    <div class="movie">
        <div class="container">
            <div>
                <h3 class="movie-list__header">Выберите фильм</h3>
            </div>
            <div class="movie-list-table">
                <table class="movie-list__table" id='filmsHire'>
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <span>Время</br>сеанса</span>
                                <!-- <img src="img/triangle.svg" alt=""> -->
                                <div class="poiner"></div>
                            </th>
                            <th>
                                <span>Наименование</span>
                                <!-- <img src="img/triangle.svg" alt=""> -->
                                <div class="poiner asc"></div>
                            </th>
                            <th>
                                <span>Год выпуска</span>
                                <!-- <div class="poiner"></div> -->
                            </th>
                            <th>
                                <span>Жанр</span>
                                <!-- <div class="poiner"></div> -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                                <td id = 'idFilmsStart1'></td>
                                <td>
                                    <a id = 'idFilmsName1' target = "_blank" href="https://www.kinopoisk.ru/film/706655/?from_block=main_recommend">
                                        
                                    </a>
                                </td>
                                <td id = 'idjenre1'></td>
                                <td>
                                    <img src="img/plus.png" alt="plus"/>
                                </td>  
                                
                            </tr>
                            <tr>
                                <td id = 'idFilmsStart2'></td>
                                <td>
                                    <a id = 'idFilmsName2' target = "_blank" href="https://www.kinopoisk.ru/film/1122114/?from_block=main_recommend">
                                       
                                    </a>
                                </td>
                                <td id = 'idjenre2'></td>
                                <td>
                                    <img src="img/plus.png" alt="plus"/>
                                </td>
                            </tr>
                            <tr>
                                <td id = 'idFilmsStart3'></td>
                                <td>
                                    <a id = 'idFilmsName3' target = "_blank" href="https://www.kinopoisk.ru/film/535341/?from_block=main_recommend">
                                        
                                    </a>
                                </td>
                                <td id = 'idjenre3'></td>
                                <td>
                                    <img src="img/plus.png" alt="plus"/>
                                </td>
                            </tr>
                            <tr>
                                <td id = 'idFilmsStart4'></td>
                                <td>
                                    <a id = 'idFilmsName4' target = "_blank" href="https://www.kinopoisk.ru/film/1048334/?from_block=main_recommend">
                                        
                                    </a>
                                </td>
                                <td id = 'idjenre4'></td>
                                <td>
                                    <img src="img/plus.png" alt="plus"/>
                                </td>
                            </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="movie-list-about">
                <p class="movie-list-about__text">Please keep in mind that the timings may differ according to the flow of the event. The even is actually day long and we do plan to finish it within our set time but it doesn’t have to be, if we all agree to hangour for some time more, what harm could it do? :)</p>
            </div>
        </div>
    </div>
    <div class="present">
        <div class="container">
            <div class="present__img"></div>
            <section class="present-block">
                <h3 class="present-block__header">Подарок каждому</h3>
                <p class="present-block__text">
                    Are you an Elite author in the Envato Marketplaces? If so we are proud of you! We want to give our thanks in achieving great success in the marketplace and we want to make known to the people of our country that you are amazing! Our Elite gifting program includes giving you special merchandize from our community and also promote your works in our community.
                </p>
                <p class="present-block__text">
                    All you have to do is contact us by clicking the button here and then its just going to the event, saying something motivational and taking that swag while looking amazing infront of thousands of other community members.
                </p>
                <p class="present-block__text">
                    *Be advised, we will only give you Elite thank you swag for each level of elite you cross. That means if you do not cross to the next elite level before the next event, you cannot claim your prizes.
                </p>
                <button id="popup_open" class="present__button">
                    Получить подарок
                </button>
            </section>
        </div>
    </div>
    <div class="movie-poster">
        <div class="container">
            <div>
                <h3 class="movie-poster__header">Фильмы</h3>
                <p class="movie-poster__text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci alias, animi, commodi eius ipsum, laudantium neque nihil omnis perferendis sed sequi tempore! Ad ea esse ex inventore repudiandae, suscipit!
                </p>
            </div>
            <section id="filmsSection" class="movie-poster-section owl-carousel">
                <!--                   
                                <div class="movie-poster__div movie-poster__div11">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/series/464963/">
                                      <img class="movie-poster__div-link-img" title="Игра пристолов" src="cinimaImg/11.webp" alt="img11"/>  
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/series/464963/" class = "movie-poster-div-obout__header">Игра пристолов</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div>
                                <div class="movie-poster__div movie-poster__div12">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/film/1048334/?from_block=main_recommend">
                                        <img class="movie-poster__div-link-img"  title="Джокер" src="cinimaImg/12.webp" alt="img12"/>
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/film/1048334/?from_block=main_recommend" class = "movie-poster-div-obout__header">Джокер</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div>
                                <div class="movie-poster__div movie-poster__div13">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/film/535341/?from_block=main_recommend">
                                        <img class="movie-poster__div-link-img"  title="1+1" src="cinimaImg/13.webp" alt="img13"/>
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/film/535341/?from_block=main_recommend" class = "movie-poster-div-obout__header">1+1</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div>
                                <div class="movie-poster__div movie-poster__div21">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/film/775276/?from_block=main_recommend">
                                        <img class="movie-poster__div-link-img"  title="Зверополис" src="cinimaImg/21.webp" alt="img21"/>
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/film/775276/?from_block=main_recommend" class = "movie-poster-div-obout__header">Зверополис</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div>
                                <div class="movie-poster__div movie-poster__div22">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/film/706655/?from_block=main_recommend">
                                        <img class="movie-poster__div-link-img"  title="Как приручить дракона 3" src="cinimaImg/22.webp" alt="img22"/>
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/film/706655/?from_block=main_recommend" class = "movie-poster-div-obout__header">Как приручить дракона 3</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div>
                                <div class="movie-poster__div movie-poster__div23">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/film/1122114/?from_block=main_recommend">
                                        <img class="movie-poster__div-link-img"  title="Собачья жизнь 2" src="cinimaImg/23.webp" alt="img23"/>
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/film/1122114/?from_block=main_recommend" class = "movie-poster-div-obout__header">Собачья жизнь 2</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div>
                                <div class="movie-poster__div movie-poster__div31">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/film/1005878/?from_block=main_recommend">
                                        <img class="movie-poster__div-link-img"  title="Король лев" src="cinimaImg/31.webp" alt="img31"/>
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/film/1005878/?from_block=main_recommend" class = "movie-poster-div-obout__header">Король лев</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div>
                                <div class="movie-poster__div movie-poster__div32">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/film/1080513/?from_block=main_recommend">
                                        <img class="movie-poster__div-link-img"  title="Вперед" src="cinimaImg/32.webp" alt="img32"/>
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/film/1080513/?from_block=main_recommend" class = "movie-poster-div-obout__header">Вперед</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div>
                                <div class="movie-poster__div movie-poster__div33">
                                    <a class="movie-poster__div-link" target = "_blank" href="https://www.kinopoisk.ru/film/1379016/?from_block=main_recommend">
                                        <img class="movie-poster__div-link-img"  title="Смешарики" src="cinimaImg/33.webp" alt="img33"/>
                                    </a>
                                    <div class = "movie-poster-div-obout">
                                        <a target = "_blank" href="https://www.kinopoisk.ru/film/1379016/?from_block=main_recommend" class = "movie-poster-div-obout__header">Смешарики</a>
                                        <div class = "movie-poster-div-obout__line"></div>
                                        <p class = "movie-poster-div-obout__text">More about selling in the Envato Marketplaces</p>
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
                                </div> -->

            </section>
        </div>
    </div>
    <div class = "map"><script charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9a3437b906617db441f49a9ce96da5468965ca00d27a0951448b3fe9ba42e1a5&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script></div>
    <footer>
        <section>
            <a href=""><img src="img/facebook.svg" alt="facebook" /></a>
            <a href=""><img src="img/twitter.svg" alt="twitter" /></a>
            <a href=""><img src="img/linkedin.svg" alt="linkedin" /></a>
            <a href=""><img src="img/googlePlus.svg" alt="googlePlus" /></a>
            <a href=""><img src="img/tumblr.svg" alt="tumblr" /></a>
        </section>
        <p>
            Hope we see you at the event!
            <br />
            All Rights Reserved. Envato Bangladesh © 2015
        </p>
    </footer>


    </div>
    <div id="popup" class="popup hidden">
        <div class="order-form">
            <div id="popup_close" class="close"></div>
            <form action="order.php" id="form" onsubmit="formSubmit(); return false;">
                <div class="" style="margin:10px">
                    <label for="idInput" hidden>Укажите имя</label>
                    <input type="text" placeholder="Введите ваше имя *" name="nameInput" id="nameInput">
                    <div class="popup-eror-message"></div>
                </div>
                <!-- <div  style="margin:10px">
                    <label for="namePasw" hidden>Введите пароль</label>
                    <input type="password" placeholder="Введите пароль" name="namePasw" id="namePasw">
                </div>
                <div  style="margin:10px">
                    <label for="nameMail" hidden>Укажите почту</label>
                    <input type="email" placeholder="Введите почту" name="nameMail" id="namePasw">
                </div> -->
                <div style="margin:10px">
                    <input type="checkbox" name="nameCheck" id="persAccess" required>
                    <label for="persAccess">Согласен на обработку персональных данных</label>
                    <div class="popup-eror-message"></div>
                </div>
                <div style="margin:10px">
                    <label for="nameSelect">Выберите ряд</label>
                    <select name="nameSelect" id="nameSelect">
                        <option value="0">Выберите место</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <div class="popup-eror-message"></div>
                </div>
                <!--  <div style="margin:10px">
                    <input type="radio" name="place" id = "r1"> 
                    <label for="r1">Детский билет</label>
                </div>
                <div style="margin:10px">
                    <input type="radio" name="place" id = "r2">
                    <label for="r2">Студенческий билет</label>
                </div>
                <div style="margin:10px">
                    <input checked type="radio" name="place" id = "r3">
                    <label for="r3">Взрослый билет</label>
                </div>
                <div style="margin:10px">
                    <label for="nameArea" hidden>Введите коментарий (при необходимости)</label>
                    <textarea name="nameArea" id = "nameArea" placeholder="Укажите комментарий"></textarea>
                </div>
                <div style="margin:10px">
                    <label for="inpFile"  hidden>Загрузите файл (при необходимости)</label>
                    <input type="file" id = "inpFile" name="inpFile" >
                </div> -->

                <div style="margin:10px">
                    <input id='submit' type="submit" value="Заказать" id='bs'>
                </div>
            </form>
        </div>
    </div>

    <div id="orderForm" class="popup hidden">
        <div class="order-form">
            <div id="closeOrderFrom" class="close"></div>
            <form id='orderTicket' enctype="multipart/form-data">

                <div class='filmTicetInfo'>
                    <p>Название фильма: <span id="orderFilmName"></span></p>
                    <p>Жанр: <span id="orderFilmGanar"></span></p>
                    <p>Время начала: <span id="orderFilmStart"></span></p>
                    <p>Зал: <span id="ordeZal"></span></p>
                    <p>Стоимость одного билета: <span id="orderFilmPrice">0</span></p>
                    <p>Количество выбранных билетов: <span id="orderFilmCountTicket"></span></p>
                    <p>Общая стоимость: <span id="orderFilmTotalPrice">0</span></p>
                </div>

                <div class="input-wrap"></div>
                <div class="cinema-tickets"></div>
                <div class="tickets-error error">
                    <p class="popup-eror-message"></p>
                </div>
                <div class="" style="margin:10px">
                    <label for="nameInput" hidden>Укажите имя</label>
                    <input type="text" placeholder="Введите ваше имя *" name="name" id="nameOrder" required>
                    <div class="popup-eror-message"></div>
                </div>
                <div class="" style="margin:10px">
                    <label for="telInput" hidden>Укажите номер телефона</label>
                    <input type="tel" placeholder="Введите ваш телефон *" name="phone" id="telOrder" required>
                    <div class="popup-eror-message"></div>
                </div>
                <div class="" style="margin:10px">
                    <label for="telInput" hidden>Укажите адрес электронной почты</label>
                    <input type="email" placeholder="Введите адрес электронной почты *" name="mail" id="mailOrder" required>
                    <div class="popup-eror-message"></div>
                </div>

                <label for="filePromo" class="btn_file_opload" id="fileField">Прикрепить файл</label>
                <input type="file" name="filePromo" id="filePromo">
                <div id='fileList'>
                    <p>Файл не выбран</p>
                </div>
                <div style="margin:10px; position: relative;">
                    <input type="submit" value="Заказать" id='sendOrder' class="present__button">
                    <div id="fountainG" style="display: none;">
                        <div id="fountainG_1" class="fountainG"></div>
                        <div id="fountainG_2" class="fountainG"></div>
                        <div id="fountainG_3" class="fountainG"></div>
                        <div id="fountainG_4" class="fountainG"></div>
                        <div id="fountainG_5" class="fountainG"></div>
                        <div id="fountainG_6" class="fountainG"></div>
                        <div id="fountainG_7" class="fountainG"></div>
                        <div id="fountainG_8" class="fountainG"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div id="popup-success" class="popup hidden">
        <div class="order-form">
            <div id="closeOrderFromSuccess" class="close"></div>
            <form>
                <div>
                    <h3 id='nameBuyerOrder'>Поздравляем!!!</h3>
                    <p id='nameBuyerOrderBody'>Вы успешно приобрели билет (билеты) в кино</p>
                </div>
            </form>
        </div>
    </div>

    <div id="popup-success-room" class="popup hidden">
        <div class="order-form-room">
            <div id="closeOrderFromSuccessRoom" class="close"></div>
            <div class="order-form-room__images">
                <img src="img/rooms/1.jpg" alt="">
                <img src="img/rooms/2.jpg" alt="">
                <img src="img/rooms/3.jpg" alt="">
                <img src="img/rooms/4.jpg" alt="">
            </div>
        </div>
    </div>




    <script src="js/jq.js"></script>
    <script src="js/plagins/owlcarusel/js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/films.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/fileUpload.js"></script>
    
</body>

</html>