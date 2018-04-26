<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../template/css/select2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../template/css/style.css">
    <link rel="stylesheet" href="../../template/css/material.min.css">
    <link rel="stylesheet" href="../../template/css/getmdl-select.min.css">
    <link rel="stylesheet" href="../../template/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../../template/css/fotorama.css">
    <title><?=$title?></title>
</head>
<body>
<!-- Uses a header that contracts as the page scrolls down. -->

<div class="layout-waterfall mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Компания Al<span style="color: #e54e53">Scope</span></span>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="waterfall-exp">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" name="sample"
                           id="waterfall-exp">
                </div>
            </div>
        </div>
        <!-- Bottom row, not visible on scroll -->
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation -->
            <?
            $main_menu = [
                'Главная' => "/",
                'Культурные сооружения' => '/cultural',
                'Актеры' => '/actors',
                'Концертные мероприятия' => '/events',
                'Контакты' => '/about'
            ];
            ?>
            <nav class="mdl-navigation">
                <?
                foreach ($main_menu as $title_menu => $url_menu){
                    $active_link = preg_match("@^$url_menu$@", $_SERVER['REQUEST_URI']) ? 'menu-active' : '';
                    echo "<a class='mdl-navigation__link {$active_link}' href='{$url_menu}'>{$title_menu}</a>";
                }
                ?>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title"><img src="../../template/media/images/Violin-icon.png" alt=""> Al<span style="color: #e54e53">Scope</span></span>
        <nav class="mdl-navigation">
            <?
            foreach ($main_menu as $title_menu => $url_menu){
                $active_link = preg_match("@^$url_menu$@", $_SERVER['REQUEST_URI']) ? 'menu-active' : '';
                echo "<a class='mdl-navigation__link menu {$active_link}' href='{$url_menu}'>{$title_menu}</a>";
            }
            ?>
        </nav>
    </div>