<?php

use yii\db\Schema;
use yii\db\Migration;

class m141009_132719_create_smart_fields extends Migration
{
    public function up()
    {
    	$this->createTable('smart_fields', [
            'id' => 'pk',
            // Just the name of the field
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            // The variable name in Schema class: ex.: TYPE_STRING 
            'schema_field' => Schema::TYPE_STRING . ' NOT NULL',
            // A normalized name conveniently associed to the name of the function
            // that will do the 'smart things' for this field
            'flag' => Schema::TYPE_STRING . ' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable('smart_fields');
    }
}
