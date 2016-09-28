<?php

use yii\db\Migration;

/**
 * Handles adding accessToken to table `user`.
 */
class m160928_152600_add_accessToken_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'accessToken', $this->string(255));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'accessToken');

    }
}
