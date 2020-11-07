<?php

/* @var $this yii\web\View */

$this->title = 'My Yii';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">
            <?php $form = \yii\widgets\ActiveForm::begin(); ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'email') ?>
            <div class="form-group">
                <?= \yii\helpers\Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>
