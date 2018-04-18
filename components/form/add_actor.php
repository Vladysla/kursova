<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 10.04.2018
 * Time: 13:11
 */
require_once "../Db.php";
require_once "../../models/Actors.php";
if ($_POST['submit']){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $patronymic = $_POST['patronymic'];
    $date = $_POST['date'];
    $grade = $_POST['grade'];
    $ganers_post = $_POST['ganers'];
    $impresario_post = $_POST['impresario'];
    $default_img = 'no-avatar.png';
    $image_title = str_replace(' ', '_', $_FILES['actor_image']['name']);
    $uploaddir = '../../template/media/images/actors/';
    $img = $uploaddir . $image_title;
    if (move_uploaded_file($_FILES['actor_image']['tmp_name'], $img)) {
        Actors::setNewActor($first_name, $last_name, $patronymic, $impresario_post, $date, $ganers_post, $grade, $image_title);
        $host  = $_SERVER['HTTP_HOST'];
        header("Location: http://$host/actors");
    } else {
        Actors::setNewActor($first_name, $last_name, $patronymic, $impresario_post, $date, $ganers_post, $grade, $default_img);
        $host  = $_SERVER['HTTP_HOST'];
        header("Location: http://$host/actors");
    }
}