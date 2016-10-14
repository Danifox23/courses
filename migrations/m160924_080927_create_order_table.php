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
            'user_id' => $this->integer(11)->notNull(),
            'total_price' => $this->float(10)->notNull(),
            'status_id' => $this->integer(11)->notNull(),
            'date' => $this->integer(11)->notNull(),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица заказов\''

        );

        $this->createIndex('order_user_id', '{{%order}}', 'user_id');
        $this->createIndex('order_status_id', '{{%order}}', 'status_id');

        $this->addForeignKey('FK_order_status', '{{%order}}', 'status_id', '{{%status}}', 'id');
        $this->addForeignKey('FK_order_user', '{{%order}}', 'user_id', '{{%user}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%order}}');
    }
}
