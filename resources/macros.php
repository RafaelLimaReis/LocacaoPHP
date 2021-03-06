<?php

use Illuminate\Support\Collection;

Html::macro('menuItem', function ($name, $url, $urlActive, $icon) {
    $element = '<li class="treeview ' . active($urlActive) . '">';
    $element .= '<a href="' . $url . '">';
    $element .= '<i class="' . $icon . ' pull-left"></i>';
    $element .= '<span class="menu-title">' . $name . '</span>';
    $element .= '</a>';
    $element .= '</li>';

    return $element;
});

Form::macro('selectField', function ($name, $label = NULL, $options = [], $value = NULL, $attributes = []) {
    $element = Form::select($name, $options, $value ? $value : old($name), field_attributes($name, $attributes));

    return field_wrapper($name, $label, $element);
});

Form::macro('dateField', function ($name, $label = NULL, $value = NULL, $attributes = []) {
    $element = '<div class="input-group date">';
    $element .= Form::dateTime($name, $value ? $value : old($name), field_attributes($name, $attributes));
    $element .= '<span class="input-group-addon">';
    $element .= '<i class="fa fa-calendar"></i>';
    $element .= '</span>';
    $element .= '</div>';

    return field_wrapper($name, $label, $element);
});

Form::macro('timeField', function ($name, $label = NULL, $value = NULL, $attributes = []) {
    $element = '<div class="input-group date">';
    $element .= Form::text($name, $value ? $value : old($name), field_attributes($name, $attributes));
    $element .= '<span class="input-group-addon">';
    $element .= '<i class="fa fa-clock-o"></i>';
    $element .= '</span>';
    $element .= '</div>';

    return field_wrapper($name, $label, $element);
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
