<?php
class SiteController {
    public function actionIndex(){
        $title = "Главная страница";
        require_once (ROOT. '/views/site/index.php');
    }
}