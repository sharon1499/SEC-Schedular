<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
        'name' => 'GroupSynch',
        'pretty_uri' => false,
        'site_url' => 'https://sec-schedulars.herokuapp.com/',
        'nav_menu' => [
            'contact' => 'Contact',
            'information' => 'Information',
            'faq' => 'FAQ',
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v3.0',
    ];
    return isset($config[$key]) ? $config[$key] : null;
}