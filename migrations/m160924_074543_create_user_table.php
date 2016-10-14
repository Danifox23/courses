<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160924_074543_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'surname' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'balance' => $this->float(255),
            'access' => $this->integer(2),
            'reg_date' => $this->integer(11),
            'authKey'=> $this->string(255),
            'accessToken' => $this->string(255),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица пользователей\''

        );

        $this->createIndex('email_index', '{{%user}}', 'email');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
