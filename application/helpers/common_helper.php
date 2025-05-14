<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function dropdown($type) {
    $data = array();

    switch($type) {
        case 'gender':
            $data = array(
                'Male' => 'Male',
                'Female' => 'Female',
                'Other' => 'Other'
            );
            break;

        case 'category':
            $data = array(
                'General' => 'General',
                'OBC' => 'OBC',
                'SC' => 'SC',
                'ST' => 'ST'
            );
            break;

        case 'religion':
            $data = array(
                'Hindu' => 'Hindu',
                'Muslim' => 'Muslim',
                'Christian' => 'Christian',
                'Sikh' => 'Sikh',
                'Other' => 'Other'
            );
            break;
        case 'permission':
            $data = array(
                'Yes' => 'Yes',
                'No' => 'No',
            );
            break;

        default:
            $data = array();
    }

    return $data;
}


if (!function_exists('post_clean')) {
    function post_clean($input)
    {
        $clean = array();

        foreach ($input as $key => $val) {
            if (is_array($val)) {
                // Recursively clean array values
                $clean[$key] = post_clean($val);
            } else {
                // Trim whitespace, strip HTML tags, and convert special characters
                $clean[$key] = htmlspecialchars(strip_tags(trim($val)), ENT_QUOTES, 'UTF-8');
            }
        }

        return $clean;
    }
}
