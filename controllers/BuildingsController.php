<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 06.04.2018
 * Time: 9:15
 */

class BuildingsController
{
    public function actionListBuildings(){
        $title = "Культурные сооружения";
        $listBuildings = CulturalBuilding::getListBuildings();
        $listScreenSizes = CulturalBuilding::getListScreenSize();
        $listNumberOfHoles = CulturalBuilding::getListNumberOfHoles();
        require_once(ROOT . '/views/buildings/index.php');
    }

}