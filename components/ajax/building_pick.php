<?
require_once "../Db.php";
require_once "../../models/CulturalBuilding.php";

$type = $_POST['bld_type'];
$screen = $_POST['screen_size'];
$holes = $_POST['bld_holes'];
$support3d = $_POST['support_3d'];

$listBuildings = CulturalBuilding::getListBuildingsByTypes($type, $screen, $holes, $support3d);

if (!empty($listBuildings)){
     foreach ($listBuildings as $list):
    $descripton = substr($list['discription'], 0, 400);
    $descripton = rtrim($descripton, "!,.-");
    $descripton = substr($descripton, 0, strrpos($descripton, ' '));
    ?>
    <div id="building-main-card" class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
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
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon building-btn">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="building-btn">
                <li id-actor="<?=$list['id']?>" class="mdl-menu__item edit-actor"><a
                        href="/actors/update/<?=$list['id']?>">Редактировать даные</a></li>
                <li id-actor="<?=$list['id']?>" class="mdl-menu__item delete-actor">Удалить из списка</li>
            </ul>
        </div>
    </div>
<? endforeach;
}