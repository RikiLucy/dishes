<?php

namespace app\modules\client\models;

use Yii;

/**
 * This is the model class for table "ingredient_dish".
 *
 * @property integer $id
 * @property string $ingredient_id
 * @property string $dish_id
 */
class IngredientDish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredient_dish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingredient_id', 'dish_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ingredient_id' => 'Ingredient ID',
            'dish_id' => 'Dish ID',
        ];
    }
}
