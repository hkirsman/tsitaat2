<?php

/**
 * @file
 * Main Drupal settings for Lando environment.
 */

/**
 * Location of the site configuration files.
 */
$config_directories['sync'] = '../sync';

/**
 * Which installation profile was used.
 */
$settings['install_profile'] = 'standard';

/**
 * Salt for one-time login links, cancel links, form tokens, etc.
 */
$settings['hash_salt'] = 'ZWXvdrSeGNAG2ekbVTRPXAPZKOm8DuAOEDWmw-NjSbft6rLbqvu1vGTWEFjar0XmncFs44jU5g';

// Configuration for Lando.
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

  $databases['migrate']['default'] = array (
    'database'  => 'drupal7',
    'username'  => 'root',
    'password'  => '',
    'host' => $lando_info['database']['internal_connection']['host'],
    'port' => $lando_info['database']['internal_connection']['port'],
    'driver'    => 'mysql',
  );

  $config['elasticsearch_helper.settings']['elasticsearch_helper']['scheme'] = 'http';
  $config['elasticsearch_helper.settings']['elasticsearch_helper']['host'] = 'elasticsearch';
  $config['elasticsearch_helper.settings']['elasticsearch_helper']['port'] = '9200';

  // Disable css/js aggregation.
  $config['system.performance']['css']['preprocess'] = FALSE;
  $config['system.performance']['js']['preprocess'] = FALSE;

  // On some occasions local setup can die because of memory issues.
  ini_set('memory_limit','2G');

  $conf['skip_permissions_hardening'] = TRUE;
}
