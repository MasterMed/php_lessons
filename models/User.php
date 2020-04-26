<?php

namespace app\models;

class User extends Model
{
    protected function getTableName()
    {
        return 'users';
    }
}