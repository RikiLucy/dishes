<?php

namespace app\modules\client\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $ingredient
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

    public function getIngredients(){
        return $this->hasMany(Ingredient::className(), ['id' => 'ingredient_id'])->viaTable('ingredient_dish', ['dish_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['title', 'ingredient', 'img'], 'string', 'max' => 255],
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
            'ingredient' => 'Ingredient',
            'img' => 'Img',
        ];
    }
}
