<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\RegForm;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;
use app\modules\admin\models\Image;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public $hasAccess;
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $hasAccess = (Yii::$app->user->identity->role == 0) ? false : true;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'hasAccess' => $hasAccess,

        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RegForm(); //используем форму регистрации
        //$date = Yii::$app->formatter->asDate($model->date_of_birth,'dd.MM.yyyy');
       // $model->date_of_birth = date_parse_from_format($model->date_of_birth,"dd.MM.yyyy");

       if ($this->request->isPost) {
           if ($model->load($this->request->post())) {
               $imageFile1 = UploadedFile::getInstance($model, 'imageFile');
               $imageFile1->saveAs('uploads/' . $imageFile1->baseName . '.' . $imageFile1->extension);
               $model->imageFile = $imageFile1->baseName . '.' . $imageFile1->extension;
               $model2 = new Image();
               $model2->name = $imageFile1->baseName . '.' . $imageFile1->extension;
               $model2->puth = $imageFile1->baseName . '.' . $imageFile1->extension;
               $model->save();
               $model2->save();

               return $this->redirect(['view', 'id' => $model->id]);
           }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //$model->date_of_birth = date_parse_from_format($model->date_of_birth,"dd.MM.yyyy");
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
