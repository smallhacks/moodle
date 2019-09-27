#!/bin/bash
# This script is part of BeekeeBox plugin for beekeebox
# Copyright (C) 2016 onwards Nicolas Martignoni
#
# This script is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This script  is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this script.  If not, see <https://www.gnu.org/licenses/>.
#
# This script MUST be run as root.
[[ $EUID -ne 0 ]] && { echo "This script must be run as root"; exit 1; }
#
# Configuration.
# Get directory of this script and Moodle source directory.
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
MOODLEDIR="$( echo $DIR | sed 's/\/admin.*//g' )"
# Path of file containing the new password (plain text).
FILE=${DIR%/*}/.newpassword
# Set username.
USER="moodlebox"
# Get oldpassword from Moodle config.php file.
OLDPASSWORD="$(grep '\$CFG->dbpass' $MOODLEDIR/config.php | cut -d\' -f2)"
#
# Actions.
# Make sure there is a matching USER, but not the root user.
if [ -n "$(getent passwd $USER)" ] && [ $USER != "root" ]; then
    NEWPASSWORD="$(head -n 1 $FILE | sed 's/ *$//g' | sed 's/^ *//g')"
    # Change the password if non empty.
    if [ -n "$NEWPASSWORD" ]; then
        # 1. Change password for database user "beekeebox".
        mysql -e "UPDATE mysql.user SET password=PASSWORD('$NEWPASSWORD') WHERE user='beekeebox'; FLUSH PRIVILEGES;"
        # 2. Change password for database user "phpmyadmin".
        mysql -e "UPDATE mysql.user SET password=PASSWORD('$NEWPASSWORD') WHERE user='phpmyadmin'; FLUSH PRIVILEGES;"
        # 3. Change password for database user "phpmyadmin" in phpMyAdmin config-db.php.
        sed -i "/\$dbpass/c\$dbpass='$NEWPASSWORD';" /etc/phpmyadmin/config-db.php
        # 4. Change password for Unix account "beekeebox".
        echo $USER:$NEWPASSWORD | chpasswd
        # 5. Change password for database user "beekeebox" in Moodle config.php.
        sed -i "/\$CFG->dbpass/c\$CFG->dbpass    = '$NEWPASSWORD';" $MOODLEDIR/config.php
    else
        echo "Empty password given"
        exit 1
    fi
fi
# End of actions.
#
# Empty password file.
> $FILE
# The end.
