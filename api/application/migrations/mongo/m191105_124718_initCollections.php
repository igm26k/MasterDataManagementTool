<?php

use app\db\MongoMigration;

class m191105_124718_initCollections extends MongoMigration
{
    public function up()
    {
        $this->createCollection('DictionaryValue');
        $this->createCollection('DictionaryMeta');
        $this->createCollection('Process');
        $this->createCollection('Service');
    }

    public function down()
    {
        $this->dropCollection('DictionaryValue');
        $this->dropCollection('DictionaryMeta');
        $this->dropCollection('Process');
        $this->dropCollection('Service');
    }
}
