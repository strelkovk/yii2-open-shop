<?php

namespace backend\controllers;

use common\models\Regions;
use yii\base\Model;
use yii\web\Controller;
use yii\web\Response;
use Yii;

class DictionaryController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTable()
    {
        $table  = Yii::$app->request->get('name');
        $action = Yii::$app->request->get('action');


        $modelName = 'common\\models\\' . $table;

        $fields =   (new $modelName)->attributeLabels();

        if($action){

            \Yii::$app->response->format = 'json';

            switch($action) {
                case 'data':
                    $items = $modelName::find()
                        ->select(array_keys($fields))
                        ->orderBy('id')->asArray()->all();

                    return $items;
                    break;
                case 'update':

                    $row = Yii::$app->request->post('row',[]);

                    if(!empty($row['id'])){
                        $model = $modelName::findOne(['id' => $row['id']]);
                    }else{
                        $model = new $modelName;
                        unset($row['id']);
                    }

                    $model->setAttributes($row);
                    $model->save();



                    return [
                        'status' => 'ok',
                    ];

                    break;
                case 'delete':
                    $id = Yii::$app->request->post('id');
                    if($id){
                        $model = $modelName::findOne(['id' => $id]);
                        $model->delete();
                        return [
                            'status' => 'ok',
                        ];
                    }
                    return [
                        'status' => 'error',
                    ];
                    break;
            }
        }

        return $this->render('table',[
            'fields' => $fields,
            'emptyFields' => array_combine(array_keys($fields),array_fill(0,count($fields),'')),
            'table' => $table,
        ]);

    }

}

/**

 *
 *
<?php
namespace Ai;
class DictionaryController extends \Ai\Controller\PageAdmin {

public $name = 'index';

public function index($table, $action = null){
$methodName = 'get_' . $table;
if(method_exists($this, $methodName)){
$fields = self::$methodName();
}

if($action){
switch($action) {
case 'data':
$fieldsStr = implode(', ', array_keys($fields));
$sql = "SELECT {$fieldsStr} FROM {$table}";
$data = $this->db->fetchAll($sql);
$this->jsonResponse($data);
break;
case 'update':
$data = $_REQUEST['row'];
if(empty($data['id'])){
unset($data['id']);
$this->db->insert($table, $data);
} else {
$id = $data['id'];
$this->db->update($table, $data, 'id =' . $id);
}
$this->jsonResponse(array('status', 'ok'));
break;
case 'delete':
$id = $_REQUEST['id'];
$this->db->delete($table, 'id =' . $id);
$this->jsonResponse(array('status', 'ok'));
break;
}
}

$this->actionTemplate = 'dictionary/table.html';
$this->set('fields', $fields);
$this->set('emptyFields', array_combine(array_keys($fields),array_fill(0,count($fields),'')));
$this->set('table', $table);
}

public function all() {

}

static public function get_brands(){
return array(
'id' => array(
'title' => 'Id',
),
'ru_name' => array(
'title' => 'Имя',
),
);
}

static public function get_groups(){
return array(
'id' => array(
'title' => 'Id',
),
'razdel_id' => array(
'title' => 'Раздел',
'note' => '(Должно быть только = 1)'
),
'parent_id' => array(
'title' => 'Id родителя',
'note' => '(Вложенность категорий только два уровня)'
),
'ru_name' => array(
'title' => 'Имя',
),
);
}


}

 *
 */
