<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Ingredient;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Dish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dish-form">

    <?php
    $all_ingredients = Ingredient::find()->all();
    $ingredients = $model->ingredients;
    $array_ingredients = ArrayHelper::getColumn($ingredients, 'id');
    //debug($array_ingredients);
    //debug($all_ingredients);

    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'img')->textInput(['maxlength' => true]) ?>


    <?php // debug($ingredient) ?>

    <?php // $form->field($model, 'desc')->dropDownList(\yii\helpers\ArrayHelper::map($ingredient, 'id', 'title'), ['multiple' => 'true']) ?>



    <table class="table table-hover">
        <thead>
        <tr>

            <th>Выбрать ингредиеты</th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($all_ingredients as $ingredient ) : ?>
            <tr>
                <td><?= $ingredient->title ?></td>
                <td><label><input <?php if (array_search($ingredient->id, $array_ingredients) !== false) echo "checked"; ?>
                            type="checkbox" name="Dish[ingredient][]" value="<?= $ingredient->id ?>">
                    </label></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php // $form->field($model, 'ingredient')->checkboxList(\yii\helpers\ArrayHelper::map($ingredient, 'id', 'title')); ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
