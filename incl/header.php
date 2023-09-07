<?php session_start();?>
<header class="header">
            <div class="container">
                <div class="header__inner">
                <div class="navbar">
                    <div class="container nav-container">
                        <input class="checkbox" type="checkbox" name="" id="" />
                        <div class="hamburger-lines">
                        <span class="line line1"></span>
                        <span class="line line2"></span>
                        <span class="line line3"></span>
                        </div>  
                    
                    <div class="logo-nav">
                    <a href="?"><img src="./img/svg/logo-mob.svg" alt=""></a>
                    </div>
                    
                    <div class="menu-items">
                        <li><a href="?">Главная</a></li>
                        <li><a href="?page=tasks">Задачи</a></li>
                        <li><a href="?page=about">О приложении</a></li>
                        <?php
                            if(isset($_SESSION['uid'])){?>
                                <li><a href="?page=users">Личный кабинет</a></li>
                            <?}
                            else{?>
                                <li><a href="?page=enter">Вперед к победам</a></li>
                            <?}?>
                    </div>
                    </div>
                </div>

                            <a href="?">
                            <div class="logo">
                                 <img src="./img/svg/logo-header.svg" alt="logo">
                             </div>
                            </a>
                            <nav class="nav">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-link" href="?">Главная</a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="?#instruction">Инструкция</a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="?page=about">О приложении</a>
                                    </li>
                                </ul>
                            </nav>
        
                    <?php
                        if(isset($_SESSION['uid'])){?>
                            <div class="header-btn"><a href="?page=users">Личный кабинет</a></div>
                            
                            <?}
                        else{?>
                            <div class="header-btn"><a href="?page=enter">Вперед к победам!</a></div>
                        <?}
                    ?>
                </div>
            </div>
</header>
