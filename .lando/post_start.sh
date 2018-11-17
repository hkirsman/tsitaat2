#!/bin/bash

#
# Helper script run post-start commands.
#

export PATH=/bin:/usr/bin:/usr/local/bin:/app/vendor/bin
set -e

echo ""
echo "#########################################################################################"
echo -e "#/ \033[33;32m GULP over docker at your service, developer. Type \"lando gulp\" to build the theme \033[0m \# "
echo "#########################################################################################"
echo ""
echo "###################################################"
echo -e "#/ \033[33;32m get an admin link running "lando drush uli"! \033[0m\#"
echo "###################################################"
echo ""
