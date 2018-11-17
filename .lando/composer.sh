#!/bin/bash

#
# Helper script to to increase Composer memory limit.
#

export PATH=/bin:/usr/bin:/usr/local/bin
set -e
php -d memory_limit=-1 $(which composer) "$@"
