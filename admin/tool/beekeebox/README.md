# BeekeeBox Moodle plugin

[![Build Status](https://travis-ci.org/beekeebox/moodle-tool_beekeebox.svg?branch=master)](https://travis-ci.org/beekeebox/moodle-tool_beekeebox)
[![GitHub release](https://img.shields.io/github/release/beekeebox/moodle-tool_beekeebox.svg)](https://github.com/beekeebox/moodle-tool_beekeebox/releases/latest)
[![GitHub Release Date](https://img.shields.io/github/release-date/beekeebox/moodle-tool_beekeebox.svg)](https://github.com/beekeebox/moodle-tool_beekeebox/releases/latest)
[![GitHub last commit](https://img.shields.io/github/last-commit/beekeebox/moodle-tool_beekeebox.svg)](https://github.com/beekeebox/beekeebox/commits/)


A Moodle administration plugin providing a GUI to some settings and management of a [BeekeeBox](https://beekeebox.net/), a Moodle server installed on a [Raspberry Pi](https://www.raspberrypi.org/).

This plugin enables a Moodle administrator to monitor some hardware settings, to set the date of the BeekeeBox, to allow restart and shutdown of the BeekeeBox and changing Raspberry Pi passwords using a GUI. After the installation in Moodle, some steps are required to complete on the Raspberry Pi (see below).

The plugin is compatible with Moodle 3.3 or later. A Raspberry Pi model 3B or 3B+ is recommended.

## Installation

The BeekeeBox plugin must be installed in the Moodle tree of the BeekeeBox, in the _tool_ folder. Once installed, an new option _BeekeeBox_ will be available in Moodle, under _Site administration > Server_ in the _Administration_ block.

To complete the installation, you have to configure some incron jobs on the BeekeeBox.

1. Install `incron` package and allow `root` to run it:
    ```bash
    sudo apt-get install incron
    echo root | sudo tee -a /etc/incron.allow
    ```

1. Add following lines to `incrontab`:
    ```bash
    /var/www/moodle/admin/tool/beekeebox/.reboot-server IN_CLOSE_WRITE /sbin/shutdown -r now
    /var/www/moodle/admin/tool/beekeebox/.shutdown-server IN_CLOSE_WRITE /sbin/shutdown -h now
    /var/www/moodle/admin/tool/beekeebox/.set-server-datetime IN_CLOSE_WRITE /bin/bash /var/www/moodle/admin/tool/beekeebox/.set-server-datetime
    /var/www/moodle/admin/tool/beekeebox/.newpassword IN_CLOSE_WRITE /bin/bash /var/www/moodle/admin/tool/beekeebox/bin/changepassword.sh
    /var/www/moodle/admin/tool/beekeebox/.wifisettings IN_CLOSE_WRITE /bin/bash /var/www/moodle/admin/tool/beekeebox/bin/changewifisettings.sh
    /var/www/moodle/admin/tool/beekeebox/.resize-partition IN_CLOSE_WRITE /bin/bash /var/www/moodle/admin/tool/beekeebox/bin/resizepartition.sh
    ```

1. Copy the following line at the end of file `/etc/sudoers`:
    ```bash
    www-data ALL=(ALL) NOPASSWD:/sbin/parted /dev/mmcblk0 unit MB print free
    ```

## Features

- Info about the BeekeeBox (kernel version, Raspbian version, free space on SD card, CPU load, CPU temperature, CPU frequency, uptime, DHCP clients).
- GUI to set the BeekeeBox date and time.
- GUI to set the BeekeeBox password.
- GUI to set the BeekeeBox Wi-Fi network password (or remove it), SSID and channel.
- GUI to resize the partition of the SD card of the BeekeeBox.
- GUI to restart and shutdown the BeekeeBox.

## Availability

The code is available at [https://github.com/beekeebox/moodle-tool_beekeebox](https://github.com/beekeebox/moodle-tool_beekeebox).

### Release notes

See [Release notes](https://github.com/beekeebox/moodle-tool_beekeebox/blob/master/CHANGELOG.md).

## License

Copyright © 2016 onwards, Nicolas Martignoni <nicolas@martignoni.net>

- All the source code is licensed under GPL 3 or any later version
- The documentation is licensed under Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International.

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.


