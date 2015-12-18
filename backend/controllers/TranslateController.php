<?php

namespace backend\controllers;

use yii\base\Model;
use yii\web\Controller;
use yii\web\Response;
use Yii;
use Zelenin\yii\modules\I18n\models\SourceMessage;

class TranslateController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        $id = Yii::$app->request->post('id');
        $language = Yii::$app->request->post('language');
        $translation = Yii::$app->request->post('translation');

        $model = SourceMessage::find()->with('messages')->where('id = :id', [':id' => $id])->one();

        $message = $model->messages[$language];

        $message->translation = $translation;


        \Yii::$app->response->format = 'json';

        if($message->save()){
            $response = [
                'status' => 'ok',
                'message' => 'Success',
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Unsuccess',
            ];        }
        return $response;
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');

        $model = SourceMessage::find()->where('id = :id', [':id' => $id])->one();

        \Yii::$app->response->format = 'json';

        if($model->delete()){
            $response = [
                'status' => 'ok',
                'message' => 'Success',
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Unsuccess',
            ];        }
        return $response;
    }

    public function actionData()
    {
        $items = SourceMessage::find()
            ->with('messages')
            ->select(['id', 'message', 'category'])
            ->orderBy('id')->asArray()->all();

        \Yii::$app->response->format = 'json';
        return $items;
    }


}
