<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product`.
 */
class m160924_080346_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->string(255)->notNull(),
            'category_id' => $this->integer(11)->notNull(),
            'purchase_price' => $this->float(10)->notNull(),
            'price' => $this->float(10)->notNull(),
            'order_id' => $this->integer(11)->notNull(),
            'manufacturer_id' => $this->integer(11)->notNull(),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица товаров\''

        );

        $this->createIndex('product_category_id', '{{%product}}', 'category_id');
        $this->createIndex('product_order_id', '{{%product}}', 'order_id');
        $this->createIndex('product_manufacturer_id', '{{%product}}', 'manufacturer_id');

        $this->addForeignKey('FK_product_category', '{{%product}}', 'category_id', '{{%category}}', 'id');
        $this->addForeignKey('FK_product_order', '{{%product}}', 'order_id', '{{%order}}', 'id');
        $this->addForeignKey('FK_product_manufacturer', '{{%product}}', 'manufacturer_id', '{{%manufacturer}}', 'id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
