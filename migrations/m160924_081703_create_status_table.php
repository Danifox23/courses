<?php

use yii\db\Migration;

/**
 * Handles the creation for table `status`.
 */
class m160924_081703_create_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'color' => $this->string(50)->notNull(),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица статусов\''

        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%status}}');
    }
}
