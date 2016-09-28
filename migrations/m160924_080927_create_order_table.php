<?php

use yii\db\Migration;

/**
 * Handles the creation for table `order`.
 */
class m160924_080927_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(10)->notNull(),
            'total_price' => $this->float([10,2])->notNull(),
            'status_id' => $this->integer(2)->notNull(),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица заказов\''

        );

        $this->createIndex('order_user_id', '{{%order}}', 'user_id');
        $this->createIndex('order_status_id', '{{%order}}', 'status_id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%order}}');
    }
}
