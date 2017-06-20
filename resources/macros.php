<?php

use Illuminate\Support\Collection;

Html::macro('menuItem', function ($name, $url, $urlActive, $icon) {
    $element = '<li class="treeview ' . active($urlActive) . '">';
    $element .= '<a href="' . $url . '">';
    $element .= '<i class="' . $icon . '"></i>';
    $element .= '<span>' . $name . '</span>';
    $element .= '</a>';
    $element .= '</li>';

    return $element;
});

Form::macro('textField', function($name, $label = NULL, $value = NULL, $atributes = []){
    $element = Form::text($name, $value ? $value : old($name), field_attributes($name, $atributes));

    return field_wrapper($name, $label, $element);
});

function field_attributes($name, $attributes = [], $noClass = false) {
    $name = str_replace('[]', '', $name);

    return array_merge(['class' => $noClass ? '' : 'form-control', 'id' => $name], $attributes);
};

function field_wrapper($name, $label, $element) {
    $out = '<div class="form-group';
    $out .= field_error($name) . '">';
    $out .= field_label($name, $label);
    $out .= $element;
    $out .= errors_msg($name);
    $out .= '</div>';

    return $out;
};

function field_error($field) {
    $error = '';
    if($errors = Session::get('errors')) {
        $error = $errors->first($field) ? ' has-error' : '';
    }
    return $error;
};

function field_label($name, $label) {
    if(is_null($label)) return '';

    $name = str_replace('[]', '', $name);

    $out = '<label for="' . $name . '" class="control-label">';
    $out .= $label . '</label>';

    return $out;
};

function errors_msg($field) {
    $errors = Session::get('errors');

    if($errors && $errors->has($field)) {
        $msg = $errors->first($field);
        return '<p class="help-block">' . $msg . '</p>';
    }

    return '';
};