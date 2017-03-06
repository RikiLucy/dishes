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

    /*public function getPreparedDish(){
        return $this->hasMany(PreparedDish::className(),['dish_id' => 'id']);
    }*/

    public function getIngredients(){
        return $this->hasMany(Ingredient::className(), ['id' => 'ingredient_id'])->viaTable('ingredient_dish', ['dish_id' => 'id']);
    }
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['ingredient'], 'safe'],
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
            'title' => 'Название',
            'desc' => 'Описание',
            'img' => 'Img',
            'ingredient' => 'Ингредиенты'
        ];
    }
}
