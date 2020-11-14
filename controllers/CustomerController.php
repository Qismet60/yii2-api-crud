<?php

namespace app\controllers;

use app\models\Customer;
use yii\db\Query;
use yii\elasticsearch\ElasticsearchTarget;
use yii\helpers\VarDumper;

class CustomerController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $customer = Customer::get(1);
        return $this->asJson(['customers' => $customer]);
    }

    public function actionCreate()
    {
//        $index = Customer::createIndex();
//        if (!$index){
//            return $this->asJson('error');
//        }
        $customer = new Customer();
        $customer->_id = 1;
        $customer->attributes = [
            'first_name' => 'user',
            'last_name' => 'surname',
            'email' => 'example.com@mail.ru'
        ];
        if ($customer->insert()){
            return $this->asJson(['customer' => $customer]);
        }
        return $this->asJson(['message' => 'while inserting error']);

    }

}
