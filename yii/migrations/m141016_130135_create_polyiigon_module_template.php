<?php

use yii\db\Schema;
use yii\db\Migration;

class m141016_130135_create_polyiigon_module_template extends Migration
{
    public function up()
    {
    	$this->createTable('polyiigon_module_template', [
            'id' => 'pk',
            // Just the name of the template
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            // A normalized name to easy refer to the module
            'slug' => Schema::TYPE_STRING . ' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable('polyiigon_module_template');
    }
}
