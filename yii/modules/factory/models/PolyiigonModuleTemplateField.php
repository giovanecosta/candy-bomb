<?php

namespace app\modules\factory\models;

use Yii;

/**
 * This is the model class for table "polyiigon_module_template_field".
 *
 * @property integer $id
 * @property string $title
 * @property integer $polyiigon_smart_field_id
 * @property integer $polyiigon_module_template_id
 *
 * @property PolyiigonModuleTemplate $polyiigonModuleTemplate
 * @property PolyiigonSmartField $polyiigonSmartField
 */
class PolyiigonModuleTemplateField extends \yii\db\ActiveRecord implements yii\db\ActiveRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polyiigon_module_template_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'polyiigon_smart_field_id', 'polyiigon_module_template_id'], 'required'],
            [['polyiigon_smart_field_id', 'polyiigon_module_template_id'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255]
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
            'polyiigon_smart_field_id' => 'Polyiigon Smart Field ID',
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
    public function getPolyiigonSmartField()
    {
        return $this->hasOne(PolyiigonSmartField::className(), ['id' => 'polyiigon_smart_field_id']);
    }
}
