<?php

namespace app\controllers;

use app\models\Customer;
use yii\elasticsearch\Exception;
use yii\rest\ActiveController as Controller;


class CustomerController extends Controller
{

    public $modelClass = Customer::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['view'], $actions['delete'],$actions['update'],$actions['index']);
        return $actions;

    }

    public function actionIndex()
    {
        $customers = Customer::find()->limit(100)->all();
//            $customer = Customer::find()->query([
//            'bool' => [
//                'must' => [
//                    ['term' => ['name' => 'rest']],
//                    ['terms' => ['email' => ['Resttest@mail.com']]]
//                ]
//            ]
//        ])->all();
//        $customer = Customer::find()->query(['match' => ['name' => 'testRestActive']])->search();
//        return $this->asJson(['customers' => $customer['hits']['hits'][0]]);
        return $this->asJson(['customers' => $customers]);
    }

    public function actionCreate()
    {
        $customer = new Customer();
        if ($customer->load(\Yii::$app->request->post())) {
            $customer->insert();
            return $this->asJson(['customer' => $customer]);
        } else {
            return $customer->errors;
        }
    }

    public function actionView($id)
    {
        $customer = new Customer();
        if (\Yii::$app->request->get()) {
            $customer = Customer::findOne($id);
            return $this->asJson(['customer' => $customer]);
        } else {
            return $customer->errors;
        }
    }

    public function actionDelete($id)
    {
        $customer = new Customer();
        try {
            $customer = Customer::deleteAll(['id' => $id]);
            return $this->asJson(['message' => 'delete']);
        } catch (Exception $e) {
            return $customer->errors;
        }
    }

    public function actionUpdate($id){
        $customer = new Customer();
        $findID = Customer::findOne($id);
        dd($findID);
//        if($customer->load(\Yii::$app->request->post()))
    }


}
