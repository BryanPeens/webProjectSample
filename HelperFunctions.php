<?php

function filterArrayExact($array, $field, $value) {
    $res = array_filter($array, function ($e) use ($field, $value) {
        return $e[$field] == $value;
    });
    return $res;
}

function filterArrayContains($array, $field, $value) {
    $res = array_filter($array, function ($e) use ($field, $value) {
        if(strpos(strtolower($e[$field]), strtolower($value)) !== FALSE) {
            return true;
        }
        return false;
    });
    return $res;
}

function filterArrayLessThan($array, $field, $value) {
    $res = array_filter($array, function ($e) use ($field, $value) {
        if ($e[$field] < $value) {
            return true;
        }     
        return false;
    });
    
    return $res;
}

function filterArrayStartsWith($array, $field, $value) {
    $res = array_filter($array, function ($e) use ($field, $value) {
        if(strpos(strtolower($e[$field]), strtolower($value)) === 0) {
            return true;
        }
        return false;
    });
    return $res;
}

function flattenArray($array, $field) {
    $array = array_reduce($array, function($array, $element) use ($field) {
        $array[] = $element[$field];
        return $array;
    });
    return $array;
}