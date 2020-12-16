<?php

namespace app\api;

use yii\rest\Serializer;

class ApiSerializer extends Serializer
{
    public function serialize($data)
    {
        $data = parent::serialize($data);

        return $data;
    }
}
