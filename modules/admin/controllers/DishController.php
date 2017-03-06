<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Ingredient;
use app\modules\admin\models\IngredientDish;
use app\modules\admin\models\PreparedDish;
use Yii;
use app\modules\admin\models\Dish;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DishController implements the CRUD actions for Dish model.
 */
class DishController extends AppAdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Dish models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Dish::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dish model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $ingredients = $model->ingredients;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'ingredients' => $ingredients
        ]);
    }

    /**
     * Creates a new Dish model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dish();
        //$dish_id = $model->id;

        // $ingredient = Ingredient::find()->all();



        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
            //debug($model);
            foreach ($model->ingredient as $item){
                $product = new IngredientDish();
                $product->dish_id = $model->id;
                $product->ingredient_id = $item;
                $product->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'ingredient' => $ingredient
            ]);
        }
    }

    /**
     * Updates an existing Dish model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $prepader_dish = $model->ingredients;
        //debug($prepader_dish);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /*$delete_old = IngredientDish::find()->where(['dish_id' => $model->id])->all();
            $delete_old->delete();*/
            IngredientDish::deleteAll(['dish_id' => $model->id]);
            foreach ($model->ingredient as $item){
                $product = new IngredientDish();
                $product->dish_id = $model->id;
                $product->ingredient_id = $item;
                $product->save(false);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dish model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dish::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
