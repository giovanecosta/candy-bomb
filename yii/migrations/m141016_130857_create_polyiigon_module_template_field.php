<?php

use yii\db\Schema;
use yii\db\Migration;

class m141016_130857_create_polyiigon_module_template_field extends Migration
{
    public function up()
    {
        $this->createTable('polyiigon_module_template_field', [
            'id' => 'pk',
            // Just the name of the field in template
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            // slug
            'slug' => Schema::TYPE_STRING . ' NOT NULL',
            // Smart field
            'polyiigon_smart_field_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            // Template table
            'polyiigon_module_template_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        // smart field
        $this->addForeignKey('polyiigon_mtf_polyiigon_sf_fk', 'polyiigon_module_template_field', 'polyiigon_smart_field_id', 'polyiigon_smart_field', 'id', 'CASCADE', 'CASCADE');
        // module template
        $this->addForeignKey('polyiigon_mtf_polyiigon_mt_fk', 'polyiigon_module_template_field', 'polyiigon_module_template_id', 'polyiigon_module_template', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('polyiigon_mtf_polyiigon_sf_fk', 'polyiigon_module_template_field');

        $this->dropForeignKey('polyiigon_mtf_polyiigon_mt_fk', 'polyiigon_module_template_field');

        $this->dropTable('polyiigon_module_template_field');
    }
}
