<?php

namespace app\modules\client\controllers;

use app\modules\client\models\Dish;
use app\modules\client\models\Ingredient;
use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Expression;

class IngredientController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $ingredients = Ingredient::find()->where([ 'status' => 1])->all();
        /*if (Yii::$app->request->post('[dish][ingredient]')){
            $search = Yii::$app->request->post();
            return $this->render('index', [
                'ingredients' => $ingredients,
                //'msg' => 'идет поиск',
                'search' => $search
            ]);
        }*/
        return $this->render('index', [
            'ingredients' => $ingredients
        ]);

    }

    public function actionSearch(){

        $dishes = Dish::find()->where([ 'ingredient' => 1])->all(); // поиск блюд только с доступными ингредиентами
        $ingredients = Ingredient::find()->where([ 'status' => 1])->all();
        $post = Yii::$app->request->post('Ingredient'); // массив ингредиенты полученные от юзера
        $count = count($post);
        $result = [];

        if( $count <=1 ){
            return $this->render('index', [
                'ingredients' => $ingredients,
                'msg' => "<h2 class='bg-warning'>Выберите больше ингредиентов</h2>"
            ]);
        }
        foreach ($dishes as $dish){
            $ingredients = $dish->ingredients; // массив ингредиентов для каждго блюда

            $array_ingredients = ArrayHelper::getColumn($ingredients, 'id');

            if (empty(array_diff($post, $array_ingredients)) and count($array_ingredients) == $count){ // проверка на полное совпадение
                //echo "Полное совпадние, блюдо - " . $dish->title . "<br>";
                $result[] = $dish->id;
            }
        }
        if (!empty($result)){
            //echo "есть полные совпадения";
            //debug($result); // id блюд с полным совпадением
        }else{
            while ( $count >= 2){
                foreach ($dishes as $dish){
                    $ingredients = $dish->ingredients; // массив ингредиентов для каждго блюда
                    $array_ingredients = ArrayHelper::getColumn($ingredients, 'id');

                    if (count(array_intersect($array_ingredients, $post)) == $count){
                        $result[] = $dish->id;
                        /*$dish->ingredient = $count;
                        $dish->save();*/
                        //echo "блюдо номер " . $dish-> id . ' название<b> ' . $dish->title . '</b> совпало ' . $count . "<br>";
                    }
                }
                //debug($count);
                $count = $count - 1;
            }
        }

        $ingredients = Ingredient::findAll($post);


        if( empty($result)){
            return $this->render('result', [
                'result' => $result,
                'ingredients' => $ingredients,
                'msg' => '<h2 class="bg-danger">Ничего не найдено</h2>'
            ]);
        }

        //debug($result);

        //$result = Dish::findAll([5,4]);
        //$result = Dish::find()->where(['id' => $result])->orderBy(['ingredient' => SORT_DESC])->all();
        /*$result = Dish::findAll($result);
        debug($result);*/

        return $this->render('result', [
            'result' => $result,
            'ingredients' => $ingredients
        ]);

    }



}
