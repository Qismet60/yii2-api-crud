<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%elastic}}`.
 */
class m201110_204630_create_elastic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%elastic}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%elastic}}');
    }
}
