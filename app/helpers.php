<?php

if(!function_exists('get_domain')) {
    /**
     * Returns the domain without the prefix and http, https things
     *
     * @return string
     */
    function get_domain()
    {
        $junk = ['http://', 'https://', 'dev.', 'api.', 'app.', 'admin.'];
        $domain = str_replace($junk, '', request()->root());

        return $domain;
    }
}

if(!function_exists('user')) {
    /**
     * Returns the logged user or some of his parameters
     *
     * @return mixed
     */
    function user($param = null)
    {
        // From api guard first or web guard if it's not from api
        $user = auth('api')->user() ?: auth()->user();

        return is_null($param) ? $user : $user->{$param};
    }
}

if(!function_exists('active')) {
    /**
     * Returns a class if the passed url is valid on Request::is()
     *
     * @return string
     */
    function active($url, $class = 'active')
    {
        return request()->is($url) ? $class : '';
    }
}
