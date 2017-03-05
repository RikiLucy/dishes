<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ingredient`.
 */
class m170304_130024_create_ingredient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ingredient', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'desc' => $this->text(),
            'img' => $this->string()->defaultValue('no_image.png'),
            'status' => $this->char()->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ingredient');
    }
}
