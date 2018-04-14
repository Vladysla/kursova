<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11.04.2018
 * Time: 10:43
 */

require_once "../Db.php";
require_once "../../models/Actors.php";

if (isset($_POST['actor_id'])){
    $id = $_POST['actor_id'];
    Actors::unsetActor($id);
}