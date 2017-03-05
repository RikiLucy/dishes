<?php

use yii\db\Migration;

/**
 * Handles the creation of table `prepared_dish`.
 */
class m170304_132703_create_prepared_dish_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('prepared_dish', [
            'id' => $this->primaryKey(),
            'ingredient_id' => $this->string(),
            'dish_id' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('prepared_dish');
    }
}
