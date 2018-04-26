<? require_once ROOT ."/views/layouts/header.php"; ?>
    <main class="mdl-layout__content">
    <div class="page-content">
<div class="container">
    <form enctype="multipart/form-data" action="/components/form/update_actor.php" method="post">
        <h4 class="mdl-dialog__title">Редактирование актера</h4>
        <div class="mdl-dialog__content">
            <div class="row">
                <div class="col-6">
                    <!-- Numeric Textfield with Floating Label -->
                    <div id="field-name" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input value="<?=$actor['first_name']?>" name="first_name" class="mdl-textfield__input" type="text" pattern="[а-яА-Я,і]+" id="name">
                        <label class="mdl-textfield__label" for="name">Имя</label>
                        <span class="mdl-textfield__error">В поле имя не должно быть цифр</span>
                    </div>
                </div>
                <div class="col-6">
                    <div id="field-name-last" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input value="<?=$actor['last_name']?>" name="last_name" class="mdl-textfield__input" type="text" pattern="[а-яА-Я,і]+" id="last-name">
                        <label class="mdl-textfield__label" for="last-name">Фамилия</label>
                        <span class="mdl-textfield__error">В поле фамилия не должно быть цифр</span>
                    </div>
                </div>
                <div class="col-6">
                    <div id="field-name-patr" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input value="<?=$actor['patronomic']?>" name="patronymic" class="mdl-textfield__input" type="text" pattern="[а-яА-Я,і]+" id="patronymic">
                        <label class="mdl-textfield__label" for="patronymic">Отчество</label>
                        <span class="mdl-textfield__error">В поле отчество не должно быть цифр</span>
                    </div>
                </div>
                <div class="col-6">
                    <div id="field-date" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input value="<?=$actor['birth_date']?>" name="date" class="mdl-textfield__input" type="text" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" id="date">
                        <label class="mdl-textfield__label" for="date">Дата рождения</label>
                        <span class="mdl-textfield__error">Дата рождения должна быть в формате DD/MM/YYYY</span>
                    </div>
                </div>
                <div class="col-12">
                    <div id="field-grade" class="mdl-textfield mdl-js-textfield">
                        <textarea name="grade" class="mdl-textfield__input" type="text" cols="150" rows= "10" id="grade" ><?=$actor['grade']?></textarea>
                        <label class="mdl-textfield__label" for="grade">Должность, заслуги</label>
                    </div>
                </div>
                <div class="col-5">
                    <label for="ganers">Выберите жанр</label>
                    <?$selectedImpresario = ''; $selectedGaners = '';?>
                    <select name="ganers[]" multiple="" id="ganers-update">
                        <? foreach ($ganersList as $genre):?>
                            <? foreach ($ganersListForActor as $ganerActor):?>
                                <?
                                if($genre['id'] == $ganerActor['ganer_id']):?>
                                    <option selected <?($genre['id'])?> value="<?=$genre['id']?>"><?=$genre['name']?></option>
                                    <?endif;?>
                            <?endforeach;?>
                            <option <?($genre['id'])?> value="<?=$genre['id']?>"><?=$genre['name']?></option>
                        <? endforeach;?>
                    </select>
                </div>
                <div class="col-6">
                    <!-- Select with floating label -->
                    <label for="impresario">Выберите импресарио</label>
                    <select name="impresario[]" multiple="" id="impresario-update">
                        <? foreach ($impresarioList as $impresario): ?>
                            <? foreach ($impresarioListForActor as $impresarioActor):?>
                                <?
                                if($impresario['id'] == $impresarioActor['impresario_id']){
                                    $selectedImpresario = "selected";}
                                else{
                                    $selectedImpresario = '';}
                                ?>
                            <?endforeach;?>
                            <option <?=$selectedImpresario?> value="<?=$impresario['id']?>"><?=$impresario['PIB']?></option>
                        <? endforeach;?>
                    </select>
                </div>
                <div class="col-8 file-upload">
                    <label for="form-file">Отправить этот файл:</label>
                    <input type="hidden" name="actor_id" value="<?=$actor['id']?>">
                    <input type="hidden" name="actor_default_image" value="<?=$actor['image_title']?>">
                    <input name="actor_image" type="file" id="form-file"/>
                </div>
            </div>
            <div class="mdl-dialog__actions">
                <!-- Raised button with ripple -->
                <button type="button" id="btn-not-add-actor"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect close">
                    Отменить
                </button>
                <input value="Добавить" type="submit" name="submit" id="btn-add-actor"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
            </div>
            </div>
    </form>
</div>
    </div>
    </main>
<? require_once ROOT ."/views/layouts/footer.php"?>