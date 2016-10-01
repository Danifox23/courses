<?php

use yii\db\Migration;

/**
 * Handles the creation for table `position`.
 */
class m160930_190642_create_position_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%position}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11)->notNull(),
            'product_id' => $this->integer(11)->notNull(),
            'quantity' => $this->integer(11)->notNull(),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица позиций\''

        );

        $this->createIndex('position_order_id', '{{%position}}', 'order_id');
        $this->createIndex('position_product_id', '{{%position}}', 'product_id');

        $this->addForeignKey('FK_position_order', '{{%position}}', 'order_id', '{{%product}}', 'id');
        $this->addForeignKey('FK_position_product', '{{%position}}', 'product_id', '{{%product}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%position}}');
    }
}
