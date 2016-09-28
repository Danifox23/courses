<?php

use yii\db\Migration;

/**
 * Handles adding authKey to table `user`.
 */
class m160928_152219_add_authKey_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'authKey', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'authKey');
    }
}
