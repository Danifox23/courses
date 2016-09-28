<?php

use yii\db\Migration;

/**
 * Handles the creation for table `category`.
 */
class m160928_141912_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'desc' => $this->string(255)->notNull(),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица категорий\''

        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
