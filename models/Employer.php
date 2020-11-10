<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employer".
 *
 * @property int $id
 */
class Employer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','surname'],'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
        ];
    }
}
