<?php

use yii\db\Schema;
use yii\db\Migration;

class m141029_125204_create_polyiigon_module_field extends Migration
{
    public function up()
    {
        $this->createTable('polyiigon_module_field', [
            'id' => 'pk',
            // Just the name of the field
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            // enabled flag
            'enabled' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            // Template field
            'polyiigon_module_template_field_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            // Module table
            'polyiigon_module_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        // Template field
        $this->addForeignKey('polyiigon_mf_polyiigon_mtf_fk', 'polyiigon_module_field', 'polyiigon_module_template_field_id', 'polyiigon_module_template_field', 'id', 'CASCADE', 'CASCADE');
        // module template
        $this->addForeignKey('polyiigon_mf_polyiigon_mod_fk', 'polyiigon_module_field', 'polyiigon_module_id', 'polyiigon_module', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('polyiigon_mf_polyiigon_mtf_fk', 'polyiigon_module_field');

        $this->dropForeignKey('polyiigon_mf_polyiigon_mod_fk', 'polyiigon_module_field');

        $this->dropTable('polyiigon_module_field');
    }
}
