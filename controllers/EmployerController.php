<?php

namespace app\controllers;

use app\models\Employer;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

class EmployerController extends ActiveController
{

    public $modelClass = Employer::class;

}
