<?php

namespace app\modules\factory\models;

use Yii;

/**
 * This is the model class for table "polyiigon_smart_field".
 *
 * @property integer $id
 * @property string $title
 * @property string $schema_field
 * @property string $flag
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
            [['title', 'schema_field', 'flag'], 'required'],
            [['title', 'schema_field', 'flag'], 'string', 'max' => 255],
            [['flag'], 'unique']
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
            'flag' => 'Flag',
        ];
    }
}
