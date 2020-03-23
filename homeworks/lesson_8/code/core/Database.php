<?php

function getDb() {
    static $db = null;
    if (is_null($db)) {
        $db = @mysqli_connect(HOST, USER, PASS, DB) or die("Could not connect: " . mysqli_connect_error());
    }
    return $db;
}

function sql_select($from, $sel = NULL, $where = NULL, $group = NULL, $order = NULL, $limit = NULL) {
    $sel = ($sel) ? $sel : "*";
    $query = "SELECT " . $sel . " FROM " . $from;
    $query .= ($where) ? " WHERE " . $where : "";
    $query .= ($group) ? " GROUP BY " . $group : "";
    $query .= ($order) ? " ORDER BY " . $order : "";
    $query .= ($limit) ? " LIMIT " . $limit : "";
    $result = mysqli_query(getDb(), $query);
    //echo $query." ".__FILE__." ".__LINE__."<br />";
    $rows = @mysqli_num_rows($result);
    if (!$rows)
        return false;
    for ($i = 0; $i < $rows; $i++) {
        $return[$i] = mysqli_fetch_assoc($result);
    }
    return $return;
}

function sql_selectOne($from, $sel = NULL, $where = NULL, $group = NULL, $order = NULL, $limit = NULL) {
    $sel = ($sel) ? $sel : "*";
    $query = "SELECT " . $sel . " FROM " . $from;
    $query .= ($where) ? " WHERE " . $where : "";
    $query .= ($group) ? " GROUP BY " . $group : "";
    $query .= ($order) ? " ORDER BY " . $order : "";
    $query .= ($limit) ? " LIMIT " . $limit : "";
    $result = mysqli_query(getDb(), $query);
    //echo $query." ".__FILE__." ".__LINE__."<br />";
    $return = @mysqli_fetch_array($result);
    return $return;
}

function sql_insert($into, $arr) {
    $fields = '';
    $values = '';
    $i = 0;
    foreach ($arr as $key => $value) {
        if ($i) {
            $fields .= ' , ';
            $values .= ' , ';
        }
        $fields .= "`" . $key . "`";
        if (is_object($value))
            $values .= $value->context;
        elseif ($value === null)
            $values .= "NULL";
        else
            $values .= "'" . $value . "'";
        $i++;
    }
    $query = "INSERT INTO " . $into . " ( " . $fields . " ) VALUES ( " . $values . " )";
    //echo $query." ".__FILE__." ".__LINE__."<br />";
    if (mysqli_query(getDb(), $query)) {
        return mysqli_insert_id(getDb());
    } else {
        return false;
    }
}

function sql_updateOne($from, $set, $where = null) {
    if ($where) {
        $where = " WHERE " . $where;
    }
    $query = "UPDATE `" . $from . "` SET " . $set . $where . " ";
    //echo $query." ".__FILE__." ".__LINE__."<br />";
    if (mysqli_query(getDb(), $query)) {
        return true;
    } else {
        return false;
    }
}

function sql_delete($from, $where) {
    if (mysqli_query(getDb(), "DELETE FROM " . $from . " WHERE " . $where . " ")) {
        return true;
    } else {
        return false;
    }
}

function sql_query($query) {
    $result = mysqli_query(getDb(), $query);
    //echo $query." ".__FILE__." ".__LINE__."<br />";
    $rows = mysqli_num_rows($result);
    if (!$rows) {
        return false;
    }/*
    if ($rows == 1) {
        return mysqli_fetch_assoc($result);
    }*/
    for ($i = 0; $i < $rows; $i++) {
        $return[$i] = mysqli_fetch_assoc($result);
    }
    return $return;
}
