<?php

use yii\db\Migration;

class m231006_145134_create_catalog_module_tables extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%property}}', [
            'id' => $this->primaryKey(),
            'property_type' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'comment' => $this->text(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        
        $this->createIndex('idx-property-id', '{{%property}}', 'id');
        $this->createIndex('idx-property-property_type', '{{%property}}', 'property_type');
        $this->createIndex('idx-property-name', '{{%property}}', 'name');
        $this->createIndex('idx-property-slug', '{{%property}}', 'slug');
        $this->createIndex('idx-property-sort', '{{%property}}', 'sort');
        $this->createIndex('idx-property-status', '{{%property}}', 'status');
        $this->createIndex('idx-property-created_at', '{{%property}}', 'created_at');
        $this->createIndex('idx-property-updated_at', '{{%property}}', 'updated_at');
        $this->createIndex('idx-property-created_by', '{{%property}}', 'created_by');
        $this->createIndex('idx-property-updated_by', '{{%property}}', 'updated_by');

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer(),
            'form_id' => $this->integer(),
            'style_id' => $this->integer(),
            'appliance_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'image' => $this->string(),
            'description' => $this->text(),
            'comment' => $this->text(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(0),
            'is_new' => $this->smallInteger()->defaultValue(0),
            'view_count' => $this->integer()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx-product-id', '{{%product}}', 'id');
        $this->createIndex('idx-product-type_id', '{{%product}}', 'type_id');
        $this->createIndex('idx-product-form_id', '{{%product}}', 'form_id');
        $this->createIndex('idx-product-style_id', '{{%product}}', 'style_id');
        $this->createIndex('idx-product-appliance_id', '{{%product}}', 'appliance_id');
        $this->createIndex('idx-product-name', '{{%product}}', 'name');
        $this->createIndex('idx-product-slug', '{{%product}}', 'slug');
        $this->createIndex('idx-product-is_new', '{{%product}}', 'is_new');
        $this->createIndex('idx-product-view_count', '{{%product}}', 'view_count');
        $this->createIndex('idx-product-image', '{{%product}}', 'image');
        $this->createIndex('idx-product-sort', '{{%product}}', 'sort');
        $this->createIndex('idx-product-status', '{{%product}}', 'status');
        $this->createIndex('idx-product-created_at', '{{%product}}', 'created_at');
        $this->createIndex('idx-product-updated_at', '{{%product}}', 'updated_at');
        $this->createIndex('idx-product-created_by', '{{%product}}', 'created_by');
        $this->createIndex('idx-product-updated_by', '{{%product}}', 'updated_by');

        $this->createTable('{{%product_image}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'image' => $this->string(),
            'sort' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx-product_image-id', '{{%product_image}}', 'id');
        $this->createIndex('idx-product_image-product_id', '{{%product_image}}', 'product_id');
        $this->createIndex('idx-product_image-image', '{{%product_image}}', 'image');
        $this->createIndex('idx-product_image-sort', '{{%product_image}}', 'sort');
        $this->createIndex('idx-product_image-created_at', '{{%product_image}}', 'created_at');
        $this->createIndex('idx-product_image-updated_at', '{{%product_image}}', 'updated_at');
        $this->createIndex('idx-product_image-created_by', '{{%product_image}}', 'created_by');
        $this->createIndex('idx-product_image-updated_by', '{{%product_image}}', 'updated_by');
        
        $this->addForeignKey('fk-product_image-product', '{{%product_image}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'RESTRICT');
        
        $this->createTable('{{%product_property}}', [
            'product_id' => $this->integer(),
            'property_id' => $this->integer(),
            'property_type' => $this->string(),
        ], $tableOptions);

        $this->addPrimaryKey('pk-product_property', '{{%product_property}}', ['product_id', 'property_id']);

        $this->createIndex('idx-product_property-product_id', '{{%product_property}}', 'product_id');
        $this->createIndex('idx-product_property-property_id', '{{%product_property}}', 'property_id');
        $this->createIndex('idx-product_property-property_type', '{{%product_property}}', 'property_type');
        
        $this->addForeignKey('fk-product_property-product', '{{%product_property}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-product_property-property', '{{%product_property}}', 'property_id', '{{%property}}', 'id', 'CASCADE', 'RESTRICT');   
        
        
        $this->createTable('{{%product_element}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'x_pos' => $this->integer(),
            'y_pos' => $this->integer(),
            'comment' => $this->text(),
            'sort' => $this->integer()->notNull()->defaultValue(1),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx-product_element-id', '{{%product_element}}', 'id');
        $this->createIndex('idx-product_element-product_id', '{{%product_element}}', 'product_id');
        $this->createIndex('idx-product_element-name', '{{%product_element}}', 'name');
        $this->createIndex('idx-product_element-x_pos', '{{%product_element}}', 'x_pos');
        $this->createIndex('idx-product_element-y_pos', '{{%product_element}}', 'y_pos');
        $this->createIndex('idx-product_element-sort', '{{%product_element}}', 'sort');
        $this->createIndex('idx-product_element-status', '{{%product_element}}', 'status');
        $this->createIndex('idx-product_element-created_at', '{{%product_element}}', 'created_at');
        $this->createIndex('idx-product_element-updated_at', '{{%product_element}}', 'updated_at');
        $this->createIndex('idx-product_element-created_by', '{{%product_element}}', 'created_by');
        $this->createIndex('idx-product_element-updated_by', '{{%product_element}}', 'updated_by');
        
        $this->addForeignKey('fk-product_element-product', '{{%product_element}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'RESTRICT');

    }

    public function safeDown()
    {
        $this->dropTable('{{%product_element}}');
        $this->dropTable('{{%product_property}}');
        $this->dropTable('{{%property}}');     
        $this->dropTable('{{%product_image}}');
        $this->dropTable('{{%product}}'); 
    }
}
