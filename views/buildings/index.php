<? require_once ROOT ."/views/layouts/header.php"?>
<main class="mdl-layout__content">
    <div class="page-content">
        <div class="container">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#all-buildings" class="mdl-tabs__tab is-active">Список всех культурных сооружений</a>
                    <a href="#lannisters-panel" class="mdl-tabs__tab">Lannisters</a>
                    <a href="#targaryens-panel" class="mdl-tabs__tab">Targaryens</a>
                </div>
                <!--                First TAB-->
                <div class="mdl-tabs__panel is-active" id="all-buildings">
                    <div class="row">
                        <? foreach ($listBuildings as $list): ?>
                            <?
                            $descripton = substr($list['discription'], 0, 400);
                            $descripton = rtrim($descripton, "!,.-");
                            $descripton = substr($descripton, 0, strrpos($descripton, ' '));
                            ?>
                            <section id="building-main-card" class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                                <div id="building-card-content" class="mdl-card mdl-cell mdl-cell--12-col" style="background-image: url('../template/media/images/cultural/<?= $list['title_img'] ?>');">
                                    <div id="building-support-text" class="mdl-card__supporting-text">
                                        <h4><?
                                            if ($list['type_of_building'] == 'cinema'){
                                                echo "кинотеатр " . $list['name'];
                                            }
                                            elseif ($list['type_of_building'] == 'theatre'){
                                                echo "театр " . $list['name'];
                                            }
                                            ?></h4>
                                        <?=$descripton. '... '?>
                                    </div>
                                    <div id="building-actions-border" class="mdl-card__actions">
                                        <a href="cultural/<?=$list['id']?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect color-accent">
                                            Подробнее
                                        </a>
                                    </div>
                                </div>
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="building-btn">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="building-btn">
                                    <li id-actor="<?=$list['id']?>" class="mdl-menu__item edit-actor"><a
                                                href="/actors/update/<?=$list['id']?>">Редактировать даные</a></li>
                                    <li id-actor="<?=$list['id']?>" class="mdl-menu__item delete-actor">Удалить из списка</li>
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
