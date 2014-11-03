<?php

namespace app\modules\factory\models;

use Yii;

use app\modules\factory\ModuleFactory;

/**
 * This is the model class for table "polyiigon_module".
 *
 * @property integer $id
 * @property string $title
 * @property string $table_name
 * @property integer $i18n
 * @property integer $polyiigon_module_template_id
 *
 * @property PolyiigonModuleTemplate $polyiigonModuleTemplate
 * @property PolyiigonModuleField[] $polyiigonModuleFields
 */
class PolyiigonModule extends \yii\db\ActiveRecord implements yii\db\ActiveRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polyiigon_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'table_name', 'i18n', 'sub_module', 'polyiigon_module_template_id'], 'required'],
            [['i18n', 'sub_module', 'polyiigon_module_template_id'], 'integer'],
            [['title', 'slug', 'parent_slug', 'table_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'parent_slug' => 'Parent Slug',
            'table_name' => 'Table Name',
            'i18n' => 'I18n',
            'sub_module' => 'Sub Module',
            'polyiigon_module_template_id' => 'Polyiigon Module Template ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolyiigonModuleTemplate()
    {
        return $this->hasOne(PolyiigonModuleTemplate::className(), ['id' => 'polyiigon_module_template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolyiigonModuleFields()
    {
        return $this->hasMany(PolyiigonModuleField::className(), ['polyiigon_module_id' => 'id']);
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            if (array_key_exists('create_table', $_GET)){

                $mf = new ModuleFactory();
                $mf->setModuleId($_GET['id']);
                $mf->up();

                die('success');
            }
            $attrs = $this->attributes;
            $attrs['table_name'] = $this->getNewTableName();
            $this->attributes = $attrs;
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $mf = new ModuleFactory();
            $mf->setModuleId($_GET['id']);
            $mf->down();            
            return true;
        } else {
            return false;
        }
    }

    private function getNewTableName($i = 0)
    {
        $table_name = 'pmodule_'.str_replace('-', '_', $this->attributes['slug']);
        if ($i > 0){
            $table_name = $table_name.'_'.$i;
        }
        if(in_array($table_name, Yii::$app->db->schema->getTableNames())){
            $table_name = $this->getNewTableName($i + 1);
        }
        return $table_name;
    }
}
