<?php

use yii\db\Migration;

class m231005_172516_create_content_module_tables extends Migration
{
    
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%lead}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string(),
            'subject' => $this->string(),
            'body' => $this->text(),
            'created_at' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx-lead-id', '{{%lead}}', 'id');
        $this->createIndex('idx-lead-name', '{{%lead}}', 'name');
        $this->createIndex('idx-lead-phone', '{{%lead}}', 'phone');
        $this->createIndex('idx-lead-email', '{{%lead}}', 'email');
        $this->createIndex('idx-lead-subject', '{{%lead}}', 'subject');
        $this->createIndex('idx-lead-created_at', '{{%lead}}', 'created_at');
        
        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'image' => $this->string(),
            'comment' => $this->text(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx-slider-id', '{{%slider}}', 'id');
        $this->createIndex('idx-slider-name', '{{%slider}}', 'name');
        $this->createIndex('idx-slider-image', '{{%slider}}', 'image');
        $this->createIndex('idx-slider-sort', '{{%slider}}', 'sort');
        $this->createIndex('idx-slider-status', '{{%slider}}', 'status');
        $this->createIndex('idx-slider-created_at', '{{%slider}}', 'created_at');
        $this->createIndex('idx-slider-updated_at', '{{%slider}}', 'updated_at');
        $this->createIndex('idx-slider-created_by', '{{%slider}}', 'created_by');
        $this->createIndex('idx-slider-updated_by', '{{%slider}}', 'updated_by');

        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'question' => $this->string()->notNull(),
            'answer' => $this->text()->notNull(),
            'comment' => $this->text(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        
        $this->createIndex('idx-question-id', '{{%question}}', 'id');
        $this->createIndex('idx-question-question', '{{%question}}', 'question');
        $this->createIndex('idx-question-sort', '{{%question}}', 'sort');
        $this->createIndex('idx-question-status', '{{%question}}', 'status');
        $this->createIndex('idx-question-created_at', '{{%question}}', 'created_at');
        $this->createIndex('idx-question-updated_at', '{{%question}}', 'updated_at');
        $this->createIndex('idx-question-created_by', '{{%question}}', 'created_by');
        $this->createIndex('idx-question-updated_by', '{{%question}}', 'updated_by');
        
        $this->createTable('{{%advantage}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string(),
            'comment' => $this->text(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        
        $this->createIndex('idx-advantage-id', '{{%advantage}}', 'id');
        $this->createIndex('idx-advantage-title', '{{%advantage}}', 'title');
        $this->createIndex('idx-advantage-image', '{{%advantage}}', 'image');
        $this->createIndex('idx-advantage-sort', '{{%advantage}}', 'sort');
        $this->createIndex('idx-advantage-status', '{{%advantage}}', 'status');
        $this->createIndex('idx-advantage-created_at', '{{%advantage}}', 'created_at');
        $this->createIndex('idx-advantage-updated_at', '{{%advantage}}', 'updated_at');
        $this->createIndex('idx-advantage-created_by', '{{%advantage}}', 'created_by');
        $this->createIndex('idx-advantage-updated_by', '{{%advantage}}', 'updated_by');
        
        $this->createTable('{{%about}}', [
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
        
        $this->createIndex('idx-about-id', '{{%about}}', 'id');
        $this->createIndex('idx-about-title', '{{%about}}', 'title');
        $this->createIndex('idx-about-image', '{{%about}}', 'image');
        $this->createIndex('idx-about-link', '{{%about}}', 'link');
        $this->createIndex('idx-about-sort', '{{%about}}', 'sort');
        $this->createIndex('idx-about-status', '{{%about}}', 'status');
        $this->createIndex('idx-about-created_at', '{{%about}}', 'created_at');
        $this->createIndex('idx-about-updated_at', '{{%about}}', 'updated_at');
        $this->createIndex('idx-about-created_by', '{{%about}}', 'created_by');
        $this->createIndex('idx-about-updated_by', '{{%about}}', 'updated_by');
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%about}}');
        $this->dropTable('{{%lead}}');
        $this->dropTable('{{%slider}}');
        $this->dropTable('{{%question}}');
        $this->dropTable('{{%advantage}}');
    }
}
