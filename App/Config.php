<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'github_local';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    const CLIENT_ID         = '402ce75544229a6fff1d';
    const CLIENT_SECRET     = 'f4d5acdcd95e844ade2efd99158b30f32aaa1ea9';
    const REDIRECT_URL      = 'http://github.local/login';
    // 50be3db6758a6977527f0198faca18a44d7d6f5b 
}
