<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%collaboration}}`.
 */
class m231214_181417_create_collaboration_table extends Migration
{
    public function safeUp(): void
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%collaboration}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string(),
            'link' => $this->string(),
            'comment' => $this->text(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx-collaboration-id', '{{%collaboration}}', 'id');
        $this->createIndex('idx-collaboration-title', '{{%collaboration}}', 'title');
        $this->createIndex('idx-collaboration-image', '{{%collaboration}}', 'image');
        $this->createIndex('idx-collaboration-link', '{{%collaboration}}', 'link');
        $this->createIndex('idx-collaboration-sort', '{{%collaboration}}', 'sort');
        $this->createIndex('idx-collaboration-status', '{{%collaboration}}', 'status');
        $this->createIndex('idx-collaboration-created_at', '{{%collaboration}}', 'created_at');
        $this->createIndex('idx-collaboration-updated_at', '{{%collaboration}}', 'updated_at');
        $this->createIndex('idx-collaboration-created_by', '{{%collaboration}}', 'created_by');
        $this->createIndex('idx-collaboration-updated_by', '{{%collaboration}}', 'updated_by');
    }

    public function safeDown(): void
    {
        $this->dropTable('{{%collaboration}}');
    }
}
