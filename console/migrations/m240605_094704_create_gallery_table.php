<?php

use yii\db\Migration;


class m240605_094704_create_gallery_table extends Migration
{
    
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%gallery}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        
        $this->createIndex('idx-gallery-id', '{{%gallery}}', 'id');
        $this->createIndex('idx-gallery-name', '{{%gallery}}', 'name');
        $this->createIndex('idx-gallery-image', '{{%gallery}}', 'image');
        $this->createIndex('idx-gallery-sort', '{{%gallery}}', 'sort');
        $this->createIndex('idx-gallery-status', '{{%gallery}}', 'status');
        $this->createIndex('idx-gallery-created_at', '{{%gallery}}', 'created_at');
        $this->createIndex('idx-gallery-updated_at', '{{%gallery}}', 'updated_at');
        $this->createIndex('idx-gallery-created_by', '{{%gallery}}', 'created_by');
        $this->createIndex('idx-gallery-updated_by', '{{%gallery}}', 'updated_by');

        $this->createTable('{{%gallery_image}}', [
            'id' => $this->primaryKey(),
            'gallery_id' => $this->integer(),
            'image' => $this->string(),
            'sort' => $this->integer(),
        ], $tableOptions);
        
        $this->createIndex('idx-gallery_image-id', '{{%gallery_image}}', 'id');
        $this->createIndex('idx-gallery_image-gallery_id', '{{%gallery_image}}', 'gallery_id');
        $this->createIndex('idx-gallery_image-image', '{{%gallery_image}}', 'image');
        $this->createIndex('idx-gallery_image-sort', '{{%gallery_image}}', 'sort');
        
        $this->addForeignKey('fk-gallery_image-gallery', '{{%gallery_image}}', 'gallery_id', '{{%gallery}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropTable('{{%gallery_image}}');
        $this->dropTable('{{%gallery}}');
    }
}
