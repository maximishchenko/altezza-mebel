<?php

use yii\db\Migration;


class m240422_071907_add_button_text_into_advantages extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%advantage}}', 'callback_button_text', $this->string()->defaultValue(null));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%advantage}}', 'callback_button_text');
    }
}
