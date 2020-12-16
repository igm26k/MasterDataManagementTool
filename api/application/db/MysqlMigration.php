<?php

namespace app\db;

use Yii;
use yii\db\Connection;
use yii\db\Migration;

abstract class MysqlMigration extends Migration
{
    /**
     * @var Connection
     */
    protected $_db;

    /**
     * @var string
     */
    protected $_tableOptions;

    public function init()
    {
        $app = Yii::$app;
        $this->_db = $app->db;
        $this->_tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';

        parent::init();
    }
}