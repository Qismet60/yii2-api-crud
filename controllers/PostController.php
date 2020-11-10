<?php

namespace app\controllers;

use app\models\Post;
use yii\rest\ActiveController;


class PostController extends ActiveController
{
    public $modelClass = Post::class;


    /*public function actions()
    {
        $actions = parent::actions();

        unset($actions['view']);


        return $actions;
    }*/

}
