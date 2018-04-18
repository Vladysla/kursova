<?php

require_once "../Db.php";
require_once "../../models/Actors.php";
$listActorsForImpresario = Actors::getListImpresario($_POST['searchImpresario']);
$output = '';

if (!empty($_POST['searchImpresario'])){
    foreach ($listActorsForImpresario as $list){
        $output .= '
    <div class="col-lg-4 col-md-4 col-sm-5">
        <div class="demo-card-square mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand" style="background: url(../template/media/images/actors/'.$list['image_title'].') bottom right 15% no-repeat #f9f9f9;">
                <h2 class="mdl-card__title-text">'.$list['first_name'].' '.$list['last_name'].'</h2>
            </div>
            <div class="mdl-card__supporting-text">
                '.$list['grade'].'
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="actor/'.$list['id'].'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">
                    Подробнее
                <span class="mdl-button__ripple-container" id="card-menu-click"><span class="mdl-ripple is-animating" style="width: 252.627px; height: 252.627px; transform: translate(-50%, -50%) translate(107px, 20px);"></span></span></a>
                <div class="mdl-card__menu">
                    <!-- Right aligned menu on top of button  -->
                    <button id="demo-menu" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">
                        <i class="material-icons">more_vert</i>
                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 92.5097px; height: 92.5097px; transform: translate(-50%, -50%) translate(14px, 12px);"></span></span></button>
    
                    <div class="mdl-menu__container is-upgraded" style="right: 0px; bottom: 36px; width: 174.141px; height: 112px;"><div class="mdl-menu__outline mdl-menu--top-right" style="width: 174.141px; height: 112px;"></div><ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events" data-mdl-for="demo-menu" data-upgraded=",MaterialMenu,MaterialRipple" style="clip: rect(0px, 174.141px, 112px, 0px);">
                        <li id-actor="'.$list['id'].'" class="mdl-menu__item mdl-js-ripple-effect edit-actor" tabindex="-1" data-upgraded=",MaterialRipple" style="transition-delay: 0.12s;">Редактировать даные<span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span></li>
                        <li id-actor="'.$list['id'].'" class="mdl-menu__item mdl-js-ripple-effect delete-actor" tabindex="-1" data-upgraded=",MaterialRipple" style="transition-delay: 0.0171429s;">Удалить из списка<span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span></li>
                    </ul></div>
                </div>
            </div>
        </div>
    </div>';
    }
    echo $output;
}else{
    echo "No data";
}