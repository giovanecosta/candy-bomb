<?php

namespace app\modules\factory\models;

use Yii;

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
            [['title', 'table_name', 'i18n', 'polyiigon_module_template_id'], 'required'],
            [['i18n', 'polyiigon_module_template_id'], 'integer'],
            [['title', 'table_name'], 'string', 'max' => 255]
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
            'table_name' => 'Table Name',
            'i18n' => 'I18n',
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
}
