<?php

use yii\db\Schema;
use yii\db\Migration;

class m141029_123917_create_polyiigon_module extends Migration
{
    public function up()
    {
        $this->createTable('polyiigon_module', [
            'id' => 'pk',
            // Just the name of the module
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            // A normalized name to easy refer to the module
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            // The slug of parent module
            'parent_slug' => Schema::TYPE_STRING, 
            // the name of the table
            'table_name' => Schema::TYPE_STRING . ' NOT NULL',
            // I18N 
            'i18n' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            // flag for sub module 
            'sub_module' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            // Template table
            'polyiigon_module_template_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        // module template
        $this->addForeignKey('polyiigon_mod_polyiigon_mt_fk', 'polyiigon_module', 'polyiigon_module_template_id', 'polyiigon_module_template', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {

        $this->dropForeignKey('polyiigon_mod_polyiigon_mt_fk', 'polyiigon_module');

        $this->dropTable('polyiigon_module');
    }
}
