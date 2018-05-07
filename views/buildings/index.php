<? require_once ROOT ."/views/layouts/header.php"?>
<main class="mdl-layout__content">
    <div class="page-content">
        <div class="container">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#starks-panel" class="mdl-tabs__tab is-active">Список всех культурных сооружений</a>
                    <a href="#lannisters-panel" class="mdl-tabs__tab">Lannisters</a>
                    <a href="#targaryens-panel" class="mdl-tabs__tab">Targaryens</a>
                </div>
                <!--                First TAB-->
                <div class="mdl-tabs__panel is-active" id="starks-panel">
                    <div class="row">
                        <? foreach ($listBuildings as $list): ?>
                            <section id="building-main-card" class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                                <div class="mdl-card mdl-cell mdl-cell--12-col" >
                                    <div class="mdl-card__supporting-text">
                                        <h4>Technology</h4>
                                        Dolore ex deserunt aute fugiat aute nulla ea sunt aliqua nisi cupidatat eu. Nostrud in laboris labore nisi amet do dolor eu fugiat consectetur elit cillum esse. Pariatur occaecat nisi laboris tempor laboris eiusmod qui id Lorem esse commodo in. Exercitation aute dolore deserunt culpa consequat elit labore incididunt elit anim.
                                    </div>
                                    <div id="building-actions-border" class="mdl-card__actions">
                                        <a href="actor/<?=$list['id']?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                            Подробнее
                                        </a>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="building-btn">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-left" for="building-btn">
                                    <li class="mdl-menu__item">Lorem</li>
                                    <li class="mdl-menu__item" disabled>Ipsum</li>
                                    <li class="mdl-menu__item">Dolor</li>
                                </ul>
                            </section>
                        <? endforeach; ?>
                    </div>
                </div>
                <!--                Second TAB-->
                <div class="mdl-tabs__panel" id="lannisters-panel">
                    <ul>
                        <li>Tywin</li>
                        <li>Cersei</li>
                        <li>Jamie</li>
                        <li>Tyrion</li>
                    </ul>
                </div>
                <!--                Third TAB-->
                <div class="mdl-tabs__panel" id="targaryens-panel">
                    <ul>
                        <li>Viserys</li>
                        <li>Daenerys</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<? require_once ROOT ."/views/layouts/footer.php"?>
