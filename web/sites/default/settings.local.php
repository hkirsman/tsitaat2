<?php

/**
 * Location of the site configuration files.
 */
$config_directories['sync'] = '../sync';


/**
 * @file
 * Main Drupal settings for Lando environment.
 */

if (getenv('LANDO_INFO') !== FALSE) {
  $lando_info = json_decode(getenv('LANDO_INFO'), TRUE);
  $databases['default']['default'] = [
    'driver' => 'mysql',
    'database' => $lando_info['database']['creds']['database'],
    'username' => $lando_info['database']['creds']['user'],
    'password' => $lando_info['database']['creds']['password'],
    'host' => $lando_info['database']['internal_connection']['host'],
    'port' => $lando_info['database']['internal_connection']['port'],
  ];

  // Disable css/js aggregation.
  $config['system.performance']['css']['preprocess'] = FALSE;
  $config['system.performance']['js']['preprocess'] = FALSE;

  // On some occasions local setup can die because of memory issues.
  ini_set('memory_limit','2G');
}
