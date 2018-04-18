<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 26.03.2018
 * Time: 10:17
 */

class Actors
{
    public static function getListForGaners($ganer_id){
        $ganer_id = intval($ganer_id);
        if($ganer_id){
            $actorsListForGaners = [];
            $db = Db::getConnection();
            $query = $db->query("SELECT actors.* FROM actors LEFT OUTER JOIN actor_ganer ON actors.id = 
            actor_ganer.actor_id WHERE actor_ganer.ganer_id = $ganer_id");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while ($row = $query->fetch()) {
                $actorsListForGaners[$i] = $row;
                $i++;
            }
            return $actorsListForGaners;
        }
    }
    public static function getListActors(){
        $actorsList = [];
        $db = Db::getConnection();
        $query = $db->query("SELECT * FROM actors");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $query->fetch()){
            $actorsList[$i] = $row;
            $i++;
        }
        return $actorsList;
    }

    public static function getListGenres(){
        $genresList = [];
        $db = Db::getConnection();
        $query = $db->query("SELECT * FROM ganers");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $genresList = $query->fetchAll();
        return $genresList;
    }

    public static function getListImpresario(){
        $impresarioList = [];
        $db = Db::getConnection();
        $query = $db->query("SELECT * FROM impressario");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $impresarioList = $query->fetchAll();
        return $impresarioList;
    }

    public static function setNewActor($firstName, $lastName, $patronymic, $impresarioList, $birth_date, $genreList, $grade, $image_title){
        $db = Db::getConnection();
        $query = $db->prepare("INSERT INTO actors (first_name, last_name, patronomic, birth_date, grade, image_title) VALUES (:firstName, :lastName, :patronymic, :birth_date, :grade, :image_title)");
        $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindParam(':patronymic', $patronymic, PDO::PARAM_STR);
        $query->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
        $query->bindParam(':grade', $grade, PDO::PARAM_STR);
        $query->bindParam(':image_title', $image_title, PDO::PARAM_STR);
        $query->execute();
        $last_id = $db->lastInsertId();
        foreach ($genreList as $ganre){
            $query_relation = $db->prepare("INSERT INTO actor_ganer (actor_id, ganer_id) VALUES (:actor_id, :ganer_id)");
            $query_relation->bindParam(':actor_id', $last_id, PDO::PARAM_INT);
            $query_relation->bindParam(':ganer_id', $ganre, PDO::PARAM_INT);
            $query_relation->execute();
        }
        foreach ($impresarioList as $impresario){
            $query_relation_impres = $db->prepare("INSERT INTO actor_impresario (actor_id, impresario_id) VALUES (:actor_id, :impresario_id)");
            $query_relation_impres->bindParam(':actor_id', $last_id, PDO::PARAM_INT);
            $query_relation_impres->bindParam(':impresario_id', $impresario, PDO::PARAM_INT);
            $query_relation_impres->execute();
        }
    }
    public static function unsetActor($id){
        $db = Db::getConnection();
        $query = $db->prepare("DELETE FROM actors WHERE actors.id = :id; DELETE FROM actor_ganer WHERE actor_id = :id; DELETE FROM `actor_impresario` WHERE actor_id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

}