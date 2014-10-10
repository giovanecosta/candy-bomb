<?php

use yii\db\Schema;
use yii\db\Migration;

class m141009_132719_create_polyiigon_smart_fields extends Migration
{
    public function up()
    {
    	$this->createTable('polyiigon_smart_fields', [
            'id' => 'pk',
            // Just the name of the field
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            // The variable name in Schema class: ex.: TYPE_STRING 
            'schema_field' => Schema::TYPE_STRING . ' NOT NULL',
            // A normalized name conveniently associed to the name of the function
            // that will do the 'smart things' for this field
            'flag' => Schema::TYPE_STRING . ' NOT NULL'
        ]);

        $this->createIndex('unique_flag', 'polyiigon_smart_fields', 'flag', true);
    }

    public function down()
    {
    	$this->dropIndex('unique_flag', 'polyiigon_smart_fields');
        $this->dropTable('polyiigon_smart_fields');
    }
}
