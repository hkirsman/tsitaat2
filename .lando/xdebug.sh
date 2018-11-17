#!/bin/bash

#
# Remove XDebug from PHP if it's disabled in .lando.yml to make the site lot faster.
# It seems xdebug: false/true disables and enables $XDEBUG_CONFIG variable.
# By renaming the xdebug ini file and reloading Apache we can remove it from PHP.
#

export PATH=/bin:/usr/bin:/usr/local/bin:/usr/sbin
set -e
conf=/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
conf_disabled="$conf.disabled"
if [ -z "$XDEBUG_CONFIG" ]; then
  if [ -f "$conf" ]; then
    mv "$conf" "$conf_disabled"
  fi
else
  if [ -f "$conf_disabled" ]; then
    mv "$conf_disabled" "$conf"
  fi
fi
service apache2 reload
