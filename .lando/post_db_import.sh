#!/bin/bash

#
# Helper script run post-db-import commands.
#

export PATH=/bin:/usr/bin:/usr/local/bin:/app/vendor/bin
set -e

cd /app/web
drush updb -y
# Output admin login url.
drush --uri=http://local.developer.tekla.com/ uli
