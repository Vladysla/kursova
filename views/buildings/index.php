<? require_once ROOT ."/views/layouts/header.php"?>
<main class="mdl-layout__content">
    <div class="page-content">
        <div class="container">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#all-buildings" class="mdl-tabs__tab is-active">Список всех культурных сооружений</a>
                    <a href="#types-buildings" class="mdl-tabs__tab">Список сооружений за типом</a>
                    <a href="#targaryens-panel" class="mdl-tabs__tab">Targaryens</a>
                </div>
                <!--                ALL BUILDINGS TAB         -->
                <div class="mdl-tabs__panel is-active" id="all-buildings">
                    <div class="row">
                        <? foreach ($listBuildings as $list): ?>
                            <?
                            $descripton = substr($list['discription'], 0, 400);
                            $descripton = rtrim($descripton, "!,.-");
                            $descripton = substr($descripton, 0, strrpos($descripton, ' '));
                            ?>
                            <div id="building-main-card" class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                                <!-- Large Tooltip add button -->
                                <div class="mdl-tooltip mdl-tooltip--large mdl-tooltip--top" for="btn-add-some-building">
                                    Добавить сооружение
                                </div>
                                <div class="mdl-button--floating-action">
                                    <!-- Colored FAB button with ripple -->
                                    <button id="btn-add-some" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
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
                                <div class="mdl-card__menu">
                                    <button id="demo-menu-buttom-right <?=$list['id']?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon building-btn">
                                        <i class="material-icons">more_vert</i>
                                    </button>
                                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                        data-mdl-for="demo-menu-buttom-right <?=$list['id']?>">
                                        <li id-building="<?=$list['id']?>" class="mdl-menu__item edit-building"><a
                                                    href="/building/update/<?=$list['id']?>">Редактировать даные</a></li>
                                        <li id-building="<?=$list['id']?>" class="mdl-menu__item delete-building">Удалить из списка</li>
                                    </ul>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
                <!--                BUILDINGS BY TYPES TAB         -->
                <div class="mdl-tabs__panel" id="types-buildings">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-4">
                            <!-- Select TYPE -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="select-building-type">
                                <input type="text" value="" class="mdl-textfield__input" id="bld-type" readonly>
                                <input type="hidden" value="" name="bld-type" id="building-type">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                <label for="bld-type" class="mdl-textfield__label">Тип сооружения</label>
                                <ul for="bld-type" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="cinema">Кинотеатр</li>
                                    <li class="mdl-menu__item" data-val="theatre">Театр</li>
                                </ul>
                            </div>
                        </div>
                        <!--                 IF CINEMA           -->
                        <div class="row" id="building-cinema-types">
                            <div class="col-4">
                                <!-- Select SCREEN SIZE -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="select-building-screen">
                                    <input type="text" value="" class="mdl-textfield__input" id="bld-screen" readonly>
                                    <input type="hidden" value="" name="bld-screen" id="building-screen">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    <label for="bld-screen" class="mdl-textfield__label">Размер экрана</label>
                                    <ul for="bld-screen" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <?foreach ($listScreenSizes as $size):?>
                                            <li class="mdl-menu__item" data-val="<?=$size['screen_size']?>"><?=$size['screen_size']?> дюймов</li>
                                        <?endforeach;?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Select NUMBER OF HOLES -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="select-building-holes">
                                    <input type="text" value="" class="mdl-textfield__input" id="bld-holes" readonly>
                                    <input type="hidden" value="" name="bld-holes" id="building-holes">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    <label for="bld-holes" class="mdl-textfield__label">Количество залов</label>
                                    <ul for="bld-holes" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <?foreach ($listNumberOfHoles as $hole):?>
                                            <li class="mdl-menu__item" data-val="<?=$hole['number_of_halls']?>"><?=$hole['number_of_halls']?> <?= ($hole['number_of_halls'] > 1) ? "зала": "зал" ?></li>
                                        <?endforeach;?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Select SUPPORT 3D -->
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="select-building-image">
                                    <input type="text" value="" class="mdl-textfield__input" id="bld-image" readonly>
                                    <input type="hidden" value="" name="bld-image" id="building-image">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    <label for="bld-image" class="mdl-textfield__label">Тип сооружения</label>
                                    <ul for="bld-image" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <li class="mdl-menu__item" data-val="0">2D поддержка</li>
                                        <li class="mdl-menu__item" data-val="1">3D поддержка</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-spinner mdl-js-spinner"></div>
                    <div class="row buildings-by-types-list"></div>
                </div>
                <!--                Third TAB-->
                <div class="mdl-tabs__panel" id="targaryens-panel">
                    <ul>
                        <li>Viserys</li>
                        <li>Daenerys</li>
                    </ul>
                </div>
                <!----- Dialog ---->
                <dialog id="dialog2" class="mdl-dialog">
                    <form enctype="multipart/form-data" action="/components/form/add_actor.php" method="post">
                        <h4 class="mdl-dialog__title">Добавление актера</h4>
                        <div class="mdl-dialog__content">
                            <!-- Numeric Textfield with Floating Label -->
                            <div id="field-name" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input name="first_name" class="mdl-textfield__input" type="text" pattern="[а-яА-Я,і]+" id="name">
                                <label class="mdl-textfield__label" for="name">Имя</label>
                                <span class="mdl-textfield__error">В поле имя не должно быть цифр</span>
                            </div>
                            <div id="field-name-last" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input name="last_name" class="mdl-textfield__input" type="text" pattern="[а-яА-Я,і]+" id="last-name">
                                <label class="mdl-textfield__label" for="last-name">Фамилия</label>
                                <span class="mdl-textfield__error">В поле фамилия не должно быть цифр</span>
                            </div>
                            <div id="field-name-patr" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input name="patronymic" class="mdl-textfield__input" type="text" pattern="[а-яА-Я,і]+" id="patronymic">
                                <label class="mdl-textfield__label" for="patronymic">Отчество</label>
                                <span class="mdl-textfield__error">В поле отчество не должно быть цифр</span>
                            </div>
                            <div id="field-date" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input name="date" class="mdl-textfield__input" type="text" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" id="date">
                                <label class="mdl-textfield__label" for="date">Дата рождения</label>
                                <span class="mdl-textfield__error">Дата рождения должна быть в формате DD/MM/YYYY</span>
                            </div>
                            <div id="field-grade" class="mdl-textfield mdl-js-textfield">
                                <textarea name="grade" class="mdl-textfield__input" type="text" rows= "10" id="grade" ></textarea>
                                <label class="mdl-textfield__label" for="grade">Должность, заслуги</label>
                            </div>
                            <label for="ganers">Выберите жанр</label>
                            <select name="ganers[]" multiple="" id="ganers">
                                <? foreach ($ganersList as $genre): ?>
                                    <option value="<?=$genre['id']?>"><?=$genre['name']?></option>
                                <? endforeach;?>
                            </select>
                            <!-- Select with floating label -->
                            <label for="impresario">Выберите импресарио</label>
                            <select name="impresario[]" multiple="" id="impresario">
                                <? foreach ($impresarioList as $impresario): ?>
                                    <option value="<?=$impresario['id']?>"><?=$impresario['PIB']?></option>
                                <? endforeach;?>
                            </select>
                            <br><br>
                            Отправить этот файл:
                            <input name="actor_image" type="file" />
                        </div>
                        <div class="mdl-dialog__actions">
                            <!-- Raised button with ripple -->
                            <button type="button" id="btn-not-add-actor"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect close">
                                Отменить
                            </button>
                            <input value="Добавить" type="submit" name="submit" id="btn-add-actor"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                        </div>
                    </form>
                </dialog>
            </div>
        </div>
    </div>
</main>
<? require_once ROOT ."/views/layouts/footer.php"?>
