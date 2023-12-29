<?php

namespace backend\controllers;

use common\models\Catnew;
use Yii;
use common\models\News;
use common\models\search\NewsSearch;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends BackendController
{
    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "News #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Displays a single News model.
     * @return mixed
     */
    public function actionNewpost()
    {
        $data = new News();
        $data->luotxem = 0;
        return $this->render('newpost', [
            'model' => $data
        ]);
    }

    /**
     * Creates a new News model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new News();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new News",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new News",
                    'content'=>'<span class="text-success">Create News success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new News",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing News model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(isset($_GET) && isset($_GET['id'])){
            $model = $this->findModel($_GET['id']);
            return $this->render('update',['model'=>$model]);
        }else{
            throw new BadRequestHttpException();
        }
    }

    /**
     * Delete an existing News model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $news = $this->findModel($id);

        if(strtolower(Yii::$app->user->identity->username)!='superadmin'){
            return $this->redirect(['news/index']);
        }

        try{
            if(is_file(Yii::getAlias('@root')).$news->image)
                unlink(Yii::getAlias('@root').$news->image);

            if(!is_file(Yii::getAlias('@root')).$news->image){
                $news->delete();
            }else{
                throw new \yii\base\Exception('Ảnh của bài viết không xóa được');
            }

            if($request->isAjax){
                /*
                *   Process for ajax request
                */
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
            }else{
                /*
                *   Process for non-ajax request
                */
                return $this->redirect(['index']);
            }
        }catch (\Exception $ex){
            throw new \yii\base\Exception('Có lỗi xảy ra');
        }

    }

     /**
     * Delete multiple existing News model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionNews_post(){
        if(isset($_POST) && isset($_POST['News'])){
            $news = new News();
            $news->load(Yii::$app->request->post());

            $news->url=\func::taoduongdan($news->title);
            $now = getdate();
            $news->posted_date=  $now["mday"] . "/" . $now["mon"] . "/" . $now["year"];

            if($news->seo_title=='' || is_null($news->seo_title))
                $news->seo_title=$news->title;
            if($news->seo_desc=='' || is_null($news->seo_desc))
                $news->seo_desc=strip_tags(nl2br(substr(strip_tags(($news->content)), 0, 156)));

            if($news->save())
                return $this->redirect(Yii::$app->urlManager->createUrl(['news','']));
            else
                $this->redirect(['site/error']);
        }else{
            return $this->redirect(['site/error']);
        }

    }

    public function actionUpdatenews(){
        if(isset($_POST) && isset($_POST['News']) && isset($_POST['News']['id'])){
            $news = News::findOne(['id' => $_POST['News']['id']]);

            if(isset($_POST['News']['posted_date'])){
                unset($_POST['News']['posted_date']);
            }

            $news->load(Yii::$app->request->post());
            $now = getdate();
            $news->posted_date=  $now["mday"] . "/" . $now["mon"] . "/" . $now["year"];

            if($news->seo_title=='' || is_null($news->seo_title))
                $news->seo_title=$news->title;
            if($news->seo_desc=='' || is_null($news->seo_desc))
                $news->seo_desc=strip_tags(nl2br(substr(strip_tags(($news->content)), 0, 156)));

            if($news->save()){
                return $this->redirect(Yii::$app->urlManager->createUrl(['news','']));
            }else{
                $this->redirect(['site/error']);
            }
        }
    }

    public function actionUpdatehome()
    {
        $News = News::find()->where(['id'=>$_POST['id']])->one();
        if(strtolower(Yii::$app->user->identity->username)!='superadmin' && $News->lang_id!=Yii::$app->user->identity->id){
            return $this->redirect(['news/index']);
        }
        News::updateAll(['home'=>(1-$News->home)],['id'=>$News->id]);
    }
    public function actionUpdateactive()
    {
        $News = News::find()->where(['id'=>$_POST['id']])->one();
        if(strtolower(Yii::$app->user->identity->username)!='superadmin' && $News->lang_id!=Yii::$app->user->identity->id){
            return $this->redirect(['news/index']);
        }
        News::updateAll(['active'=>(1-$News->active)],['id'=>$News->id]);
    }
}
