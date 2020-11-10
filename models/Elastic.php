<?php

namespace app\models;

use yii\elasticsearch\ActiveRecord;

/**
 * This is the model class for table "elastic".
 *
 * @property int $id
 */
class Elastic extends ActiveRecord
{
    public static function mapping()
    {
        return [
            // Field types: https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping.html#field-datatypes
            'properties' => [
                'id' => ['type' => 'integer'],
                'name' => ['type' => 'text'],
                'email' => ['type' => 'keyword'],
                'is_active' => ['type' => 'boolean'],
            ]
        ];
    }

    /**
     * Set (update) mappings for this model
     */
    public static function updateMapping()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->setMapping(static::index(), static::type(), static::mapping());
    }

    /**
     * Create this model's index
     */
    public static function createIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->createIndex(static::index(), [
            //'aliases' => [ /* ... */ ],
            'mappings' => static::mapping(),
            //'settings' => [ /* ... */ ],
        ]);
    }

    /**
     * Delete this model's index
     */
    public static function deleteIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->deleteIndex(static::index(), static::type());
    }

    public function attributes()
    {
        return [
            'id','name','email','is_active'
        ];
    }
}
