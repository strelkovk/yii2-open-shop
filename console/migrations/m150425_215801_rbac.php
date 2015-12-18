<?php

$path = Yii::getAlias('@yii/rbac/migrations');
require_once($path . DIRECTORY_SEPARATOR . 'm140506_102106_rbac_init.php');

class m150425_215801_rbac extends m140506_102106_rbac_init
{
    public function up()
    {

        parent::up();

        $auth = new \yii\rbac\DbManager;
        $auth->init();

        $holderRole = $auth->createRole('holder');
        $auth->add($holderRole);

        $adminRole = $auth->createRole('administrator');
        $auth->add($adminRole);

    }
}
