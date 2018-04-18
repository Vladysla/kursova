<? require_once ROOT ."/views/layouts/header.php"?>
<main class="mdl-layout__content">
    <div class="page-content">
        <div class="container">
            <!-- Large Tooltip add button -->
            <div class="mdl-tooltip mdl-tooltip--large mdl-tooltip--top" for="btn-add-some">
                Добавить актера
            </div>
            <div class="mdl-button--floating-action">
                <!-- Colored FAB button with ripple -->
                <button id="btn-add-some" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                    <i class="material-icons">add</i>
                </button>
            </div>
            <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect act-list">
                <div class="mdl-tabs__tab-bar">
                    <a href="#all-list-panel" id="list_all" class="mdl-tabs__tab is-active">Список всех артистов</a>
                    <a href="#list-genre-panel" id="list_genre" class="mdl-tabs__tab">Список артистов за жанром</a>
                    <a href="#list-impresario-panel" id="list_ipresario" class="mdl-tabs__tab">Список артистов за импрессарио</a>
                </div>
                <!-- Large Tooltip 1 -->
                <div class="mdl-tooltip mdl-tooltip--large" for="list_all">
                    Список всех артистов
                </div>
                <!-- Large Tooltip 2 -->
                <div class="mdl-tooltip mdl-tooltip--large" for="list_genre">
                    Cписок артистов, выступающих в указанном жанре
                </div>
                <!-- Large Tooltip 3 -->
                <div class="mdl-tooltip mdl-tooltip--large" for="list_ipresario">
                    Cписок артистов, которые работают с указанным импресарио
                </div>
                <div class="mdl-tabs__panel is-active" id="all-list-panel">
                    <div class="row justify-content-between">
                        <? foreach ($actorsList as $list): ?>
                            <div class="col-lg-4 col-md-4 col-sm-5">
                                <div class="demo-card-square mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title mdl-card--expand" style="background:
                                            url('../template/media/images/actors/<?=$list['image_title']?>') bottom right 15% no-repeat #f9f9f9;">
                                        <h2 class="mdl-card__title-text"><?=$list['first_name'] . " " . $list['last_name']?></h2>
                                    </div>
                                    <div class="mdl-card__supporting-text">
                                        <?=$list['grade']?>
                                    </div>
                                    <div class="mdl-card__actions mdl-card--border">
                                        <a href="actor/<?=$list['id']?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                            Подробнее
                                        </a>
                                        <div class="mdl-card__menu">
                                            <!-- Right aligned menu on top of button  -->
                                            <button id="demo-menu-top-right <?=$list['id']?>"
                                                    class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                                <i class="material-icons">more_vert</i>
                                            </button>

                                            <ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect"
                                                data-mdl-for="demo-menu-top-right <?=$list['id']?>">
                                                <li id-actor="<?=$list['id']?>" class="mdl-menu__item edit-actor">Редактировать даные</li>
                                                <li id-actor="<?=$list['id']?>" class="mdl-menu__item delete-actor">Удалить из списка</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
                <div class="mdl-tabs__panel" id="list-genre-panel">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-10">
                            <!-- Select with fixed height -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" style="margin-left: 25%;">
                                <input type="text" value="" class="mdl-textfield__input" id="result_search" readonly>
                                <input type="hidden" value="" name="result_search" id="inp-hidden-genre">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                <label for="result_search" class="mdl-textfield__label">Жанр</label>
                                <ul for="sample5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <? foreach ($ganersList as $genre): ?>
                                        <li class="mdl-menu__item" data-val="<?=$genre['id']?>"><?=$genre['name']?></li>
                                    <? endforeach;?>
                                </ul>
                            </div>
                            <!-- Raised button with ripple -->
                            <button id="btn-serch-val" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="margin-left: 3%;">
                                Найти
                            </button>
                        </div>
                    </div>
                    <div class="mdl-spinner mdl-js-spinner"></div>
                    <div class="row actors-list"></div>
                </div>
                <div class="mdl-tabs__panel" id="list-impresario-panel">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-10">
                            <!-- Select with fixed height -->
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" style="margin-left: 25%;">
                                <input type="text" value="" class="mdl-textfield__input" id="result_search" readonly>
                                <input type="hidden" value="" name="result_search" id="inp-hidden-impresario">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                <label for="result_search" class="mdl-textfield__label">Импрессарио</label>
                                <ul for="sample5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <? foreach ($impresarioList as $impresario): ?>
                                        <li class="mdl-menu__item" data-val="<?=$impresario['id']?>"><?=$impresario['PIB']?></li>
                                    <? endforeach;?>
                                </ul>
                            </div>
                            <!-- Raised button with ripple -->
                            <button id="btn-serch-val-impresario" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="margin-left: 3%;">
                                Найти
                            </button>
                        </div>
                    </div>
                    <div class="mdl-spinner mdl-js-spinner"></div>
                    <div class="row actors-list-impresario"></div>
                </div>
            </div>
            <!----- Dialog ---->
            <dialog class="mdl-dialog">
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
</main>
<? require_once ROOT ."/views/layouts/footer.php"?>