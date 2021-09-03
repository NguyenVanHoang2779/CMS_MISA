<?php

namespace backend\controllers;

use backend\compoments\models\form\ChangePassword;
use common\models\TblBranch;
use common\models\TblHo;
use common\models\TblPartner;
use Yii;
use common\models\User;
use backend\models\search\UserSearch;
use yii\base\BaseObject;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
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
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($model->user_type == 1) {
//                $model->branch_id = $model->unit;
//                $model->ho_id = null;
//                $model->partner_id = null;
//            } else if ($model->user_type == 2) {
//                $model->branch_id = null;
//                $model->ho_id = $model->unit;
//                $model->partner_id = null;
//            }else if ($model->user_type == 3) {
//                $model->branch_id = null;
//                $model->ho_id = null;
//                $model->partner_id = $model->unit;            }
//
//            if ($model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//
//        }
        if ($model->load(Yii::$app->request->post())) {
            $user = Yii::$app->request->post();
//            $model->user_type = $user['User']['user_type'];
//            if ($model->user_type == 1) {
//                $model->branch_id = $user['User']['unit'];
//                $model->ho_id = null;
//                $model->partner_id = null;
//            } else if ($model->user_type == 2) {
//                $model->branch_id = null;
//                $model->ho_id = $user['User']['unit'];
//                $model->partner_id = null;
//            }else  {
//
//                $model->branch_id = null;
//                $model->ho_id = null;
//                $model->partner_id = $user['User']['unit'];
//            }
            $model->admin =1;
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionQueryType()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];

                if ($cat_id == 1) {
                    $data = TblBranch::find()->select(['id', 'name'])->all();
                    $rs = [];
                    foreach ($data as $t) {
                        array_push($rs, ['id' => $t['id'], 'name' => $t['name']]);
                    }
                    return ['output' => $rs, 'selected' => ''];
                } else if ($cat_id == 2) {
                    $data = TblHo::find()->select(['id', 'name'])->all();
                    $rs = [];
                    foreach ($data as $t) {
                        array_push($rs, ['id' => $t['id'], 'name' => $t['name']]);
                    }
                    return ['output' => $rs, 'selected' => ''];
                } else if($cat_id == 3){
                    $data = TblPartner::find()->select(['id', 'name'])->all();
                    $rs = [];
                    foreach ($data as $t) {
                        array_push($rs, ['id' => $t['id'], 'name' => $t['name']]);
                    }
                    return ['output' => $rs, 'selected' => ''];
                } else {
                    return ['output' => []];
                }

            }
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {
            $user = Yii::$app->request->post();
            $model->user_type = $user['User']['user_type'];

            if ($model->user_type == 1) {
                $model->branch_id = $user['User']['unit'];
                $model->ho_id = null;
                $model->partner_id = null;
            } else if ($model->user_type == 2) {
                $model->branch_id = null;
                $model->ho_id = $user['User']['unit'];
                $model->partner_id = null;
            }else if ($model->user_type == 3) {
                $model->branch_id = null;
                $model->ho_id = null;
                $model->partner_id = $user['User']['unit'];
            }

            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }
        if ($model->user_type == 1) {
            $model->departementName = $model->branch->name;
            $model->departementID = $model->branch_id;
        } else if ($model->user_type == 2) {
            $model->departementName = $model->ho->name;
            $model->departementID = $model->ho_id;
        } else if ($model->user_type == 3) {
            $model->departementName = $model->partner->name;
            $model->departementID = $model->partner_id;
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionChangePassword($id) {
        $model = new ChangePassword();
        $model->id = $id;
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
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
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
