<?php

namespace App\Libraries;

//helper class to get enum options value in laravel eloquent

class Eset {
    public static function getEnumValues($table, $column) {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type;

        //preg_match('/^enum\((.*)\)$/', $type, $matches);
        preg_match('/^enum\((.*)\)$/', $type, $matches);

        $enum = array();

        foreach( explode(',', $matches[1]) as $value )
        {
            $v = trim( $value, "'");
            $enum = array_add($enum, $v, $v);
        }

        return $enum;
    }
}