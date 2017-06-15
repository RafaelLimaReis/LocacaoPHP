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

