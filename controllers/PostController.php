<?php

namespace app\controllers;

use app\models\Post;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = new Post();
        return $this->render('index');
    }

    public function actionCreate()
    {
        $query = new Post();
        if ($query->load(\Yii::$app->request->post()) && $query->validate())
        {
            
        }
    }

}
