<?php

use yii\db\Migration;

/**
 * Handles the creation for table `manufacturer`.
 */
class m160928_141619_create_manufacturer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%manufacturer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица производителей\''

        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%manufacturer}}');
    }
}
