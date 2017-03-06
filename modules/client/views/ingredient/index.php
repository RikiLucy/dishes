<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Выберите нужные ингредиенты (максимум 5-ть)</h1>

<?php $form = ActiveForm::begin([
    'action' => \yii\helpers\Url::to(['ingredient/search']),
    //'method' => 'get'
]); ?>


<table class="table table-hover">
    <thead>
    <tr>

        <th></th>
        <th></th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($ingredients as $ingredient ) : ?>
        <tr>


            <td><?= $ingredient->title ?></td>
            <td><label><input type="checkbox" name="Ingredient[]" value="<?= $ingredient->id ?>"></label></td>


        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

    <div class="form-group">
        <?= Html::submitButton('Поиск', [ 'class' => "btn btn-success btn-lg"]) ?>
    </div>

<?php ActiveForm::end(); ?>
<?= $msg ?>

