<?php

namespace app\modules\factory\models;

use Yii;

/**
 * This is the model class for table "polyiigon_module_field".
 *
 * @property integer $id
 * @property string $title
 * @property integer $polyiigon_module_template_field_id
 * @property integer $polyiigon_module_id
 *
 * @property PolyiigonModule $polyiigonModule
 * @property PolyiigonModuleTemplateField $polyiigonModuleTemplateField
 */
class PolyiigonModuleField extends \yii\db\ActiveRecord implements yii\db\ActiveRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polyiigon_module_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'polyiigon_module_template_field_id', 'polyiigon_module_id'], 'required'],
            [['polyiigon_module_template_field_id', 'polyiigon_module_id'], 'integer'],
            [['title'], 'string', 'max' => 255]
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
            'polyiigon_module_template_field_id' => 'Polyiigon Module Template Field ID',
            'polyiigon_module_id' => 'Polyiigon Module ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolyiigonModule()
    {
        return $this->hasOne(PolyiigonModule::className(), ['id' => 'polyiigon_module_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolyiigonModuleTemplateField()
    {
        return $this->hasOne(PolyiigonModuleTemplateField::className(), ['id' => 'polyiigon_module_template_field_id']);
    }
}
