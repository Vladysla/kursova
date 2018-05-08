<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 06.04.2018
 * Time: 9:11
 */

class CulturalBuilding
{
    /**
     * @return array
     */
    public static function getListBuildings()
    {
        $db = Db::getConnection();
        $listBuildings = $db->query("SELECT * FROM cultural_buildings");
        return $listBuildings->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public static function getListScreenSize()
    {
        $db = Db::getConnection();
        $listBuildings = $db->query("SELECT DISTINCT screen_size FROM cultural_buildings");
        return $listBuildings->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public static function getListNumberOfHoles()
    {
        $db = Db::getConnection();
        $listBuildings = $db->query("SELECT DISTINCT number_of_halls FROM cultural_buildings");
        return $listBuildings->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $building_type
     * @param string $screen_size
     * @param string $number_of_holes
     * @param string $support_3d
     * @return array
     */
    public static function getListBuildingsByTypes($building_type, $screen_size = '', $number_of_holes = '', $support_3d = '')
    {
        $sql = "SELECT * FROM cultural_buildings WHERE type_of_building = :building_type";
        if (!empty($screen_size)){
            $screen_size = intval($screen_size);
            $sql .= " AND screen_size = :screen_size";
        }
        if (!empty($number_of_holes)){
            $number_of_holes = intval($number_of_holes);
            $sql .= " AND number_of_halls = :number_of_holes";
        }
        if (!empty($support_3d)){
            $support_3d = intval($support_3d);
            $sql .= " AND support_3d = :support_3d";
        }
        $db = Db::getConnection();
        $list = $db->prepare($sql);
        $list->bindParam(":building_type", $building_type, PDO::PARAM_STR);
        if (!empty($screen_size)){
            $list->bindParam(":screen_size", $screen_size, PDO::PARAM_INT);
        }
        if (!empty($number_of_holes)){
            $list->bindParam(":number_of_holes", $number_of_holes, PDO::PARAM_INT);
        }
        if (!empty($support_3d)){
            $list->bindParam(":support_3d", $support_3d, PDO::PARAM_INT);
        }
        $list->execute();
        return $list->fetchAll(PDO::FETCH_ASSOC);
    }

}