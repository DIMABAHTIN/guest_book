<?php

class Helper extends Model {

    public function form($action, $arr_fields, $class = null, $id = null) {
        $html = '<form action="' . $action . '" class="' . $class . '" id="' . $id . '">"';

        foreach ($arr_fields as $arr_field) {
            $html .= $arr_field['name'] . '<input name="' . $arr_field['field'] . '>';
        }

        return $html;
    }

    public function pagination() {

    }
}
