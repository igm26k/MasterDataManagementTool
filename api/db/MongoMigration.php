<?php

namespace app\db;

use Yii;
use yii\mongodb\Connection;
use yii\mongodb\Migration;

abstract class MongoMigration extends Migration
{
    /**
     * @var Connection
     */
    protected $mongodb;

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->mongodb = Yii::$app->mongodb;

        parent::init();
    }

    /**
     * This method contains the logic to be executed when applying this migration.
     *
     * @return bool return a false value to indicate the migration fails
     * and should not proceed further. All other return values mean the migration succeeds.
     */
    abstract public function up();

    /**
     * This method contains the logic to be executed when removing this migration.
     * The default implementation throws an exception indicating the migration cannot be removed.
     *
     * @return bool return a false value to indicate the migration fails
     * and should not proceed further. All other return values mean the migration succeeds.
     */
    abstract public function down();
}