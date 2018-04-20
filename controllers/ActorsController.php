<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 26.03.2018
 * Time: 10:15
 */

class ActorsController
{
    /**
     * @param $ganer_id
     */
    public function actionGaners($ganer_id){
        $actorsListForGaners = Actors::getListForGaners($ganer_id);
        if ($actorsListForGaners == ''){
            echo "<h1>Актеров не найдено</h1>";
        }
        print_r($actorsListForGaners);
        $title = "Актеры";
        require_once(ROOT . '/views/actors/ganers.php');
    }

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
        require_once(ROOT . '/views/actors/updateActor.php');
    }

}