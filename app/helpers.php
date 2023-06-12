<?php

if (!function_exists('hashTokenWithDate')) {
    /**
     * Self explanatory
     *
     * @return string
     */
    function hashTokenWithDate($token)
    {
        return sha1($token . now()->format('Y-m-d'));
    }
}
