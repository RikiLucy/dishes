<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $img
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['title', 'img'], 'string', 'max' => 255],
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
        ];
    }
}
