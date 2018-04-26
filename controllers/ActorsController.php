<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 26.03.2018
 * Time: 10:15
 */

class ActorsController
{
    public function actionListActors(){
        $title = "Список актеров";
        $actorsList = Actors::getListActors();
        $ganersList = Actors::getListGenres();
        $impresarioList = Actors::getListImpresario();
        require_once(ROOT . '/views/actors/listActors.php');
    }
    public function actionUpdateActor($actor_id){
        $title = "Редактирование актера";
        $ganersList = Actors::getListGenres();
        $impresarioList = Actors::getListImpresario();
        $actor = Actors::getActor($actor_id);
        $ganersListForActor = Actors::getListGenresForActorById($actor_id);
        $impresarioListForActor = Actors::getListImpresarioForActorById($actor_id);
        require_once(ROOT . '/views/actors/updateActor.php');
    }

}