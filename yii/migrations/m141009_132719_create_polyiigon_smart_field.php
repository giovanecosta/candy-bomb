<?php

use yii\db\Schema;
use yii\db\Migration;

class m141009_132719_create_polyiigon_smart_field extends Migration
{
    public function up()
    {
    	$this->createTable('polyiigon_smart_field', [
            'id' => 'pk',
            // Just the name of the field
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            // The variable name in Schema class: ex.: TYPE_STRING 
            'schema_field' => Schema::TYPE_STRING . ' NOT NULL',
            // A normalized name conveniently associed to the name of the function
            // that will do the 'smart things' for this field
            'slug' => Schema::TYPE_STRING . ' NOT NULL'
        ]);

        $this->createIndex('unique_slug', 'polyiigon_smart_field', 'slug', true);
    }

    public function down()
    {
    	$this->dropIndex('unique_slug', 'polyiigon_smart_field');
        $this->dropTable('polyiigon_smart_field');
    }
}
