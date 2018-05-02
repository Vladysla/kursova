<? require_once ROOT ."/views/layouts/header.php"?>
<?var_dump($listBuildings);?>
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
                    <ul>
                        <li>Eddard</li>
                        <li>Catelyn</li>
                        <li>Robb</li>
                        <li>Sansa</li>
                        <li>Brandon</li>
                        <li>Arya</li>
                        <li>Rickon</li>
                    </ul>
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
