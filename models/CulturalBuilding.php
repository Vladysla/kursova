<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 06.04.2018
 * Time: 9:11
 */

class CulturalBuilding
{
    public static function getListBuildings()
    {
        $db = Db::getConnection();
        $listBuildings = $db->query("SELECT * FROM cultural_buildings");
        $listBuildings->execute();
        $listBuildings->fetchAll(PDO::FETCH_ASSOC);
        return $listBuildings;
    }

}