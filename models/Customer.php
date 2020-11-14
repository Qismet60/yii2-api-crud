<?php


namespace app\models;


use yii\elasticsearch\ActiveRecord;

class Customer extends ActiveRecord
{
    public static function mapping()
    {
        return [
            'properties' => [
                'first_name' => ['type' => 'text'],
                'last_name' => ['type' => 'text'],
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

        $command->deleteIndex(static::index(), static::type());
    }

    public function attributes()
    {
        return [
            'first_name', 'last_name', 'email'
        ];
    }
}