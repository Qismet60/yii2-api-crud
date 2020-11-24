<?php


namespace app\models;


use yii\elasticsearch\ActiveRecord;

class Customer extends ActiveRecord
{

    public static function index()
    {
        new \yii\db\ActiveRecord();
        return 'yii2_affiliate_service_customer';
    }


    public function rules()
    {
        return [
            [['name','email','surname'],'required'],
            ['name','string'],
            ['surname','string'],
            ['email','email'],
        ];
    }

    public static function mapping()
    {
        return [
            'properties' => [
                'name' => ['type' => 'text'],
                'surname' => ['type' => 'text'],
                'email' => ['type' => 'keyword'],
            ]
        ];
    }


    public static function updateMapping()
    {
        $db = static::getDb();

        $command = $db->createCommand();

        $command->setMapping(static::index(), static::type(), static::mapping());
    }

    public static function createIndex()
    {
        $db = static::getDb();

        $command = $db->createCommand();

        $command->createIndex(static::index(),
            [
                'mappings' => static::mapping(),
            ]);
    }

    public static function deleteIndex()
    {
        $db = static::getDb();

        $command = $db->createCommand();

        $command->deleteIndex(static::index());
    }

    public function attributes()
    {
        return [
            'surname', 'name', 'email'
        ];
    }

    public function search(){

    }
}