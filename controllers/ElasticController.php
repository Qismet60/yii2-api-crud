<?php

namespace app\controllers;


use app\models\Elastic;
use yii\elasticsearch\ActiveRecord;

class ElasticController extends ActiveRecord
{
    public function actionIndex()
    {
//       $elastic = new Elastic();
        Elastic::createIndex();
    }

}
