<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'tool_beekeebox', language 'en' (English)
 *
 * @package    tool_beekeebox
 * @copyright  2016 onwards Nicolas Martignoni {@link mailto:nicolas@martignoni.net}
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['changepassworderror'] = 'The BeekeeBox password was not changed. The passwords given don\'t match.';
$string['changepasswordmessage'] = 'The main password of the BeekeeBox (Unix account) was changed.<br /><br />Warning! The password of the Admin user of the Moodle <b>was not changed</b>. To change it, please use the preferences page of this user.';
$string['changewifisettings'] = 'Change Wi-Fi settings';
$string['cpufrequency'] = 'CPU frequency';
$string['cpuload'] = 'CPU load';
$string['cputemperature'] = 'CPU temperature';
$string['datetime'] = 'Date and time';
$string['datetime_help'] = 'If the BeekeeBox is not connected to the Internet, it will not be on time. It can be set manually using this setting.';
$string['datetimemessage'] = 'The clock of the BeekeeBox was set. To get the most accuracy, it\'s recommended to connect the BeekeeBox to an Internet connected network via an ethernet cable.';
$string['datetimeset'] = 'Set date and time';
$string['datetimesetmessage'] = 'The clock of the BeekeeBox isn\'t on time. It\'s highly recommended to set the date and time to the current time.';
$string['datetimesetting'] = 'Date and time';
$string['dhcpclientinfo'] = 'Client IP address and name';
$string['dhcpclientnumber'] = 'number of clients';
$string['dhcpclients'] = 'DHCP clients';
$string['hidden'] = 'Hidden';
$string['information'] = 'Information';
$string['kernelversion'] = 'Kernel version';
$string['moodleboxinfo'] = 'MoodleBox version';
$string['beekeeboxinfofileerror'] = 'Information not available';
$string['beekeeboxpluginversion'] = 'BeekeeBox plugin version';
$string['missingconfigurationerror'] = 'This section isn\'t available. The plugin installation is not complete, so that the setting cannot be handled by the BeekeeBox. Please read the <a href="https://github.com/beekeebox/moodle-tool_beekeebox/blob/master/README.md" target="_blank">installation documentation</a> to fix this error.';
$string['moodleboxcredits'] = 'The BeekeeBox is based on the MoodleBox by Nicolas Martignoni';
$string['parameter'] = 'Parameter';
$string['passwordprotected'] = 'Password protected';
$string['passwordsetting'] = 'BeekeeBox password';
$string['passwordsetting_help'] = 'BeekeeBox main password can be changed here. __It is strongly discouraged to keep the default password__. Your __must__ definitely change it as minimal security measure.';
$string['pijuicebatterychargelevel'] = 'PiJuice charge level';
$string['pijuicebatterystatus'] = 'PiJuice battery status';
$string['pijuicebatterytemp'] = 'PiJuice battery temperature';
$string['pijuiceisfault'] = 'PiJuice fault';
$string['pijuicestatuserror'] = 'PiJuice status';
$string['pluginname'] = 'BeekeeBox';
$string['privacy:metadata'] = 'The BeekeeBox plugin displays information from the Raspberry Pi and enables some configuration changes, but does not affect or store any personal data itself.';
$string['resizepartition'] = 'Resize SD card partition';
$string['resizepartition_help'] = 'Use this button to resize the SD card partition.';
$string['resizepartitionmessage'] = 'The SD card partition has been resized to its maximal size. The BeekeeBox is restarting now. It will be online again in a moment.';
$string['resizepartitionsetting'] = 'SD card partition resizing';
$string['raspberryhardware'] = 'Raspberry Pi model';
$string['raspbianversion'] = 'Raspbian version';
$string['restart'] = 'Restart BeekeeBox';
$string['restartmessage'] = 'The BeekeeBox is restarting. It will be online again in a moment.';
$string['restartstop'] = 'Restart and shutdown';
$string['restartstop_help'] = 'Use these buttons to restart or turn off the BeekeeBox. It is not recommended to unplug the power supply to shutdown the BeekeeBox.';
$string['rpi1'] = 'Raspberry Pi 1';
$string['rpi2'] = 'Raspberry Pi 2B';
$string['rpi3'] = 'Raspberry Pi 3B';
$string['rpi3bplus'] = 'Raspberry Pi 3B+';
$string['rpizerow'] = 'Raspberry Pi Zero W';
$string['sdcardavailablespace'] = 'Free space on SD card';
$string['shutdown'] = 'Shutdown BeekeeBox';
$string['shutdownmessage'] = 'The BeekeeBox is shutting down. Please wait a few seconds before disconnecting the power supply.';
$string['systeminfo'] = 'BeekeeBox information';
$string['systeminfo_help'] = 'The BeekeeBox information dashboard displays several important data about the BeekeeBox. This info includes:

* Critical BeekeeBox operation details, such as remaining disk space on the SD card and processor load, temperature and frequency
* Current settings of Wi-Fi network supplied by the BeekeeBox
* Number, IP address and name of all devices connected to the BeekeeBox
* Raspberry Pi model and operating system
* BeekeeBox version and BeekeeBox plugin version
';
$string['unknownmodel'] = 'Unknown Raspberry Pi model';
$string['unsupportedhardware'] = 'Unsupported server hardware detected! This plugin does only work on Raspberry Pi';
$string['uptime'] = 'System uptime';
$string['visible'] = 'Visible';
$string['wifichannel'] = 'Wi-Fi channel';
$string['wifichannel_help'] = 'It is not necessary to change the Wi-Fi broadcast channel unless the performance is poor due to interference.';
$string['wificountry'] = 'Wi-Fi regulatory country';
$string['wificountry_help'] = 'For legal reasons, it is recommended to set your country as the Wi-Fi regulatory country.';
$string['wifipassword'] = 'Wi-Fi password';
$string['wifipassword_help'] = 'If you have chosen a password protected Wi-Fi network, to prevent intruders from using the BeekeeBox Wi-Fi network, it is recommended to change its default password. The Wi-Fi network password must have between 8 and 63 characters.';
$string['wifipassworderror'] = 'The Wi-Fi network password must have between 8 and 63 characters.';
$string['wifipasswordon'] = 'Wi-Fi network protection';
$string['wifipasswordon_help'] = 'If enabled, users have to type a password to connect to the BeekeeBox Wi-Fi network.';
$string['wifisettings'] = 'Wi-Fi settings';
$string['wifisettingsmessage'] = 'The Wi-Fi settings were changed. Don\'t forget to communicate the new SSID and password to your students.';
$string['wifissid'] = 'Wi-Fi network name';
$string['wifissid_help'] = 'The name of the Wi-Fi network (SSID) of the BeekeeBox. It must be a string of at least 1 byte and at most 32 bytes. Remember that some characters, such as emojis, use more than one byte.';
$string['wifissidhidden'] = 'Hidden Wi-Fi network';
$string['wifissidhiddenstate'] = 'Wi-Fi SSID visibility';
$string['wifissidhiddenstate_help'] = 'If enabled, Wi-Fi SSID will be hidden from users, who won\'t know that there\'s a BeekeeBox around. This will notably reduce the usability of the device, but improve slightly its security.';
$string['pijuicebatterylevel'] = 'Battery level';


// Deprecated.
$string['changepasswordsetting'] = 'BeekeeBox password change';
$string['changewifipassword'] = 'Change Wi-Fi password';
$string['currentwifipassword'] = 'Current Wi-Fi password';
$string['newwifipassword'] = 'New Wi-Fi password';
$string['nopassworddefined'] = 'No Wi-Fi password defined';
$string['wifipasswordmessage'] = 'The Wi-Fi network password was changed. Don\'t forget to communicate it to your students.';
$string['wifipasswordonhelp'] = 'If enabled, users have to type a password to connect to the BeekeeBox Wi-Fi network.';
$string['wifipasswordsetting'] = 'Wi-Fi network password change';
