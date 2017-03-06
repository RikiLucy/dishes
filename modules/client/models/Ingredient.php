<?php

namespace app\modules\client\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $img
 * @property string $status
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['title', 'img'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1],
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
            'desc' => 'Desc',
            'img' => 'Img',
            'status' => 'Status',
        ];
    }
}
