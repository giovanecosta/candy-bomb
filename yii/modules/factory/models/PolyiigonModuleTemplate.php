<?php

namespace app\modules\factory\models;

use Yii;

/**
 * This is the model class for table "polyiigon_module_template".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 *
 * @property PolyiigonModuleTemplateField[] $polyiigonModuleTemplateFields
 */
class PolyiigonModuleTemplate extends \yii\db\ActiveRecord implements yii\db\ActiveRecordInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polyiigon_module_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolyiigonModuleTemplateFields()
    {
        return $this->hasMany(PolyiigonModuleTemplateField::className(), ['polyiigon_module_template_id' => 'id']);
    }
}
