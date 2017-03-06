<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Ingredient */

$this->title = 'Создать ингредиент';
$this->params['breadcrumbs'][] = ['label' => 'Ingredients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
