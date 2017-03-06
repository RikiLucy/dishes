<?php

namespace app\modules\admin\models;

//use app\modules\client\models\Dish;
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

    public function getDishes(){
        return $this->hasMany(Dish::className(), ['id' => 'dish_id'])->viaTable('ingredient_dish', ['ingredient_id' => 'id']);
    }

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
            'title' => 'Название',
            'desc' => 'Описание',
            'img' => 'Img',
            'status' => 'Доступность',
        ];
    }
}
