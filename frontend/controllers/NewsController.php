<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 27.12.2015
 * Time: 0:28
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * News controller
 */
class NewsController extends Controller
{


    public function actionIndex()
    {
        $items = [
            [
                'img'=>'slider1',
                'title'=>'<span>Welcome to <strong>Margo1</strong></span>',
                'note'=>'<span>The ultimate aim of your business 1</span>',
                'button'=>'Check Now 1',
                'url'=>'#1',
            ],
            [
                'img'=>'slider2',
                'title'=>'<span>Welcome to <strong>Margo2</strong></span>',
                'note'=>'<span>The ultimate aim of your business 2</span>',
                'button'=>'Check Now 2',
                'url'=>'#2',
            ],
            [
                'img'=>'slider3',
                'title'=>'<span>Welcome to <strong>Margo3</strong></span>',
                'note'=>'<span>The ultimate aim of your business 3</span>',
                'button'=>'Check Now 3',
                'url'=>'#3',
            ],

        ];
        return $this->render('index', ['items' => $items] );

    }


}
