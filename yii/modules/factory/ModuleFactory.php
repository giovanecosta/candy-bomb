<?php

namespace app\modules\factory;

use yii\db\Schema;
use yii\db\Migration;

use app\modules\factory\models\PolyiigonModule;

class ModuleFactory extends Migration
{
    private $table_name;
    private $fields;
    private $module_id;
    private $sub_module;

    public function setModuleId($module_id)
    {
        $this->module_id = $module_id;

        $module = PolyiigonModule::findOne($module_id);

        $this->table_name = $module->table_name;
        $this->sub_module = $module->sub_module;
        $this->fields = $module->getPolyiigonModuleFields()->all();

    }

    public function up()
    {
        $fields = $this->prepareFields();
        $this->createTable($this->table_name, $fields);
    }

    public function down()
    {

        $this->dropTable($this->table_name);
    }

    private function prepareFields()
    {
        $fields = array('id' => 'pk');

        $r = new \ReflectionClass('yii\db\Schema');

        foreach ($this->fields as $field) {
            $mtf = $field->getPolyiigonModuleTemplateField()->one();
            $sf = $mtf->getPolyiigonSmartField()->one();
            $name = $mtf->slug;
            $fields[$name] = $r->getConstant($sf->schema_field);
        }

        if ($this->sub_module){
            $fields['parent_id'] = Schema::TYPE_INTEGER.' NOT NULL';
        }

        return $fields;
    }

}