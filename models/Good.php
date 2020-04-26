<?php

namespace app\models;

use app\services\DBII;

class Good extends Model implements DBII
{
    use \app\services\TestT;

    protected function getTableName()
    {
        return 'goods';
    }
}