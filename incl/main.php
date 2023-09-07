<main class="main">
            <section class="banner">
                <div class="container">
                    <div class="banner__inner">
                        <div class="banner__descr">
                            <h2 class="banner__title">Приветствую Вас на сайте Peppo.do, который поможет Вам разобраться с Вашими делами</h2>
                            <h3 class="banner__suptitle">Peppo.do - список дел и таск-<br>менеджер № 1 в России</h3>
                        <?php
                            if(!isset($_SESSION['uid'])){?>
                                <div class="action-btn"><a href="?page=enter">Начать</a></div>
                            <?}
                            else{?>
                                <div class="action-btn"><a href="?page=tasks">Перейти к задачам</a></div>
                           <? }
                        ?>
                        </div>
                        <div class="banner__img">
                            <img src="./img/svg/iphone.svg" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <section class="instruction" id="instruction">
                <div class="container">
                    <div class="intsruction__inner">
                        <h3 class="instruction__title">Для того, что начать необходимо выполнить простую инструкцию</h3>

                        <div class="top-instr">
                            <div class="one-item">
                                <h2 class="item-numb">1.</h2>
                                <p class="item-text">перейдите по ссылке в шапке</p>
                            </div>
                            <img src="./img/svg/Arrow 2.svg" alt="">
                            <div class="one-item">
                                <h2 class="item-numb">2.</h2>
                                <p class="item-text">пройдите регистрацию или авторизуйтесь</p>
                            </div>
                        </div>

                        <img class="middle-arrow" src="./img/svg/Arrow 4.svg" alt="">

                        <div class="bottom-instr">
                            <div class="action-instr">
                                <h3 class="btn-title">Удачи!</h3>
                            </div>
                            <img src="./img/svg/Arrow 3.svg" alt="">
                            <div class="one-item">
                                <h2 class="item-numb">3.</h2>
                                <p class="item-text">запишите свои дела и начните действовать</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>


            <section class="instruction__mob">
            <div class="container__mob">
                <div class="instruction__mob-inner">
                    <h3 class="instruction__mob-title">Для того, что начать необходимо выполнить простую инструкцию</h3>
                    <ul class="instruction__mob-list">
                        <li class="instruction__mob-item">
                            перейдите по ссылке в шапке или баннере
                        </li>
                        <li class="instruction__mob-item">
                            пройдите регистрацию или авторизуйтесь
                        </li>
                        <li class="instruction__mob-item">
                            запишите свои дела и начните действовать
                        </li>
                        <h3 class="instruction__mob-subtitle">Удачи !</h3>
                    </ul>
                </div>
            </div>
        </section>
        </main>