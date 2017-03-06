<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h2>Введенные ингредиенты: </h2>
<ul class="list-group">
<?php

foreach ($ingredients as $ingredient) : ?>
        <li class="list-group-item"><?= $ingredient->title ?> </li>
<?php endforeach; ?>
</ul>
<br>

<h2> Найденные блюда: </h2>
<?= $msg ?>
<ul class="list-group">
    <?php foreach ($result as $id ) : $dish = \app\modules\client\models\Dish::findOne($id);?>


        <li class="list-group-item">
            <?php
            echo "<h3>" . $dish->title . "</h3>";
            echo "Ингредиенты: ";
            foreach ($dish->ingredients as $ingredient){
                echo $ingredient->title . ", ";
            }
            ?>
        </li>
    <?php endforeach; ?>
</ul>


