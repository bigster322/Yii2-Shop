<?php
/**
 * Created by PhpStorm.
 * User: Mizantrap
 * Date: 17.02.2019
 * Time: 17:19
 */

namespace app\controllers;

use yii\web\Controller;
use Yii;

class AppController extends Controller {

    protected $session;

    protected function setMeta($title = null, $keywords = null, $description = null) {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);

    }

    protected function openSession() {
        $this->session = Yii::$app->session;
        $this->session->open();
    }

}