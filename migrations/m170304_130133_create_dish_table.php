<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dish`.
 */
class m170304_130133_create_dish_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dish', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'desc' => $this->text(),
            'ingredient' => $this->string(), // нужно изменить на статус
            'img' => $this->string()->defaultValue('no_image.png'),
            //'status' => $this->char()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dish');
    }
}
