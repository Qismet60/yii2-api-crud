<?php

namespace app\controllers;

use app\models\Post;
use phpDocumentor\Reflection\Types\This;
use yii\db\Exception;
use yii\web\NotFoundHttpException;

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
        if ($query->load(\Yii::$app->request->post()) && $query->save())
        {
            return $this->redirect(['view','id'=>$query->id]);
        }else{
            return $this->render('index',[
               'model' =>$query
            ]);
        }
    }
    public function actionView($id)
    {
        $model = Post::findOne($id);
        if ($model===null){
            throw new NotFoundHttpException();
        }
        else{
            return $this->render('view',[
               'model' => $model
            ]);
        }
    }

}
