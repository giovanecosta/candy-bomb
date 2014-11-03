<?php

namespace app\modules\factory\models;

use Yii;

/**
 * This is the model class for table "polyiigon_smart_field".
 *
 * @property integer $id
 * @property string $title
 * @property string $schema_field
 * @property string $slug
 *
 * @property PolyiigonModuleTemplateField[] $polyiigonModuleTemplateFields
 */
class PolyiigonSmartField extends \yii\db\ActiveRecord implements yii\db\ActiveRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polyiigon_smart_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'schema_field', 'slug'], 'required'],
            [['title', 'schema_field', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique']
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
            'schema_field' => 'Schema Field',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolyiigonModuleTemplateFields()
    {
        return $this->hasMany(PolyiigonModuleTemplateField::className(), ['polyiigon_smart_field_id' => 'id']);
    }
}
