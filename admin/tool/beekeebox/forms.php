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
 * BeekeeBox dashboard form definition.
 *
 * @package    tool_beekeebox
 * @copyright  2018 onwards Nicolas Martignoni {@link mailto:nicolas@martignoni.net}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/lib/formslib.php');

/**
 * Class datetimeset_form
 *
 * Form class to set time and date.
 *
 * @package    tool_beekeebox
 * @copyright  2016 onwards Nicolas Martignoni {@link mailto:nicolas@martignoni.net}
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class datetimeset_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        $mform = $this->_form;
        $mform->addElement('date_time_selector', 'currentdatetime', get_string('datetime', 'tool_beekeebox'),
                            array(
                                'startyear' => date("Y") - 2,
                                'stopyear'  => date("Y") + 2,
                                'timezone'  => 99,
                                'step'      => 1,
                                'optional'  => true)
                            );
        $mform->addHelpButton('currentdatetime', 'datetime', 'tool_beekeebox');

        $this->add_action_buttons(false, get_string('datetimeset', 'tool_beekeebox'));
    }
}

/**
 * Class changepassword_form
 *
 * Form class to change BeekeeBox password.
 *
 * @package    tool_beekeebox
 * @copyright  2016 onwards Nicolas Martignoni {@link mailto:nicolas@martignoni.net}
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class changepassword_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        $mform = $this->_form;

        $mform->addElement('passwordunmask', 'newpassword1', get_string('newpassword'));
        $mform->addRule('newpassword1', get_string('required'), 'required', null, 'client');
        $mform->setType('newpassword1', PARAM_RAW_TRIMMED);

        $mform->addElement('passwordunmask', 'newpassword2', get_string('newpassword').' ('.get_string('again').')');
        $mform->addRule('newpassword2', get_string('required'), 'required', null, 'client');
        $mform->setType('newpassword2', PARAM_RAW_TRIMMED);

        $this->add_action_buttons(false, get_string('changepassword'));
    }

    /**
     * Validate the form.
     * @param array $data submitted data
     * @param array $files not used
     * @return array errors
     */
    public function validation($data, $files) {
        $errors = array();

        if ($data['newpassword1'] <> $data['newpassword2']) {
            $errors['newpassword1'] = get_string('passwordsdiffer');
            $errors['newpassword2'] = get_string('passwordsdiffer');
        }

        return $errors;
    }
}

/**
 * Class wifisettings_form
 *
 * Form class to change BeekeeBox Wi-Fi settings.
 *
 * @package    tool_beekeebox
 * @copyright  2016 onwards Nicolas Martignoni {@link mailto:nicolas@martignoni.net}
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class wifisettings_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        global $currentwifissid;
        global $currentwifissidhiddenstate;
        global $currentwifichannel;
        global $currentwifipassword;
        global $currentwificountry;

        $mform = $this->_form;

        // SSID setting.
        $mform->addElement('text', 'wifissid', get_string('wifissid', 'tool_beekeebox'));
        $mform->addRule('wifissid', get_string('required'), 'required', null, 'client');
        $mform->setType('wifissid', PARAM_RAW_TRIMMED);
        $mform->setDefault('wifissid', $currentwifissid);
        $mform->addHelpButton('wifissid', 'wifissid', 'tool_beekeebox');

        // SSID hiding setting.
        $mform->addElement('checkbox', 'wifissidhiddenstate', get_string('wifissidhiddenstate', 'tool_beekeebox'),
            ' ' . get_string('wifissidhidden', 'tool_beekeebox'));
        $mform->setDefault('wifissidhiddenstate', ($currentwifissidhiddenstate == 0) ? 0 : 1);
        $mform->setType('wifissidhiddenstate', PARAM_INT);
        $mform->addHelpButton('wifissidhiddenstate', 'wifissidhiddenstate', 'tool_beekeebox');

        // Channel setting.
        if ($currentwificountry == 'US' or $currentwificountry == 'CA') {
            $wifichannelrange = range(1, 11);
        } else {
            $wifichannelrange = range(1, 13);
        }
        $mform->addElement('select', 'wifichannel', get_string('wifichannel', 'tool_beekeebox'),
                array_combine($wifichannelrange, $wifichannelrange));
        $mform->addRule('wifichannel', get_string('required'), 'required', null, 'client');
        $mform->setType('wifichannel', PARAM_INT);
        $mform->setDefault('wifichannel', $currentwifichannel);
        $mform->addHelpButton('wifichannel', 'wifichannel', 'tool_beekeebox');

        // Regulatory country setting.
        $mform->addElement('select', 'wificountry', get_string('wificountry', 'tool_beekeebox'),
                get_string_manager()->get_list_of_countries(true));
        $mform->addRule('wificountry', get_string('required'), 'required', null, 'client');
        $mform->setType('wificountry', PARAM_RAW);
        $mform->setDefault('wificountry', $currentwificountry);
        $mform->addHelpButton('wificountry', 'wificountry', 'tool_beekeebox');

        // Password protection setting.
        $mform->addElement('checkbox', 'wifipasswordon', get_string('wifipasswordon', 'tool_beekeebox'),
            ' ' . get_string('passwordprotected', 'tool_beekeebox'));
        $mform->setDefault('wifipasswordon', ($currentwifipassword == null) ? 0 : 1);
        $mform->setType('wifipasswordon', PARAM_INT);
        $mform->addHelpButton('wifipasswordon', 'wifipasswordon', 'tool_beekeebox');

        // Password setting.
        $mform->addElement('text', 'wifipassword', get_string('wifipassword', 'tool_beekeebox'));
        $mform->disabledIf('wifipassword', 'wifipasswordon');
        $mform->setType('wifipassword', PARAM_RAW_TRIMMED);
        $mform->setDefault('wifipassword', ($currentwifipassword == null) ? 'beekeebox' : $currentwifipassword);
        $mform->addHelpButton('wifipassword', 'wifipassword', 'tool_beekeebox');

        $this->add_action_buttons(false, get_string('changewifisettings', 'tool_beekeebox'));
    }

}

/**
 * Class resizepartition_form
 *
 * Form class to resize the partition of the BeekeeBox.
 *
 * @package    tool_beekeebox
 * @copyright  2018 onwards Nicolas Martignoni {@link mailto:nicolas@martignoni.net}
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class resizepartition_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        $mform = $this->_form;
        $buttonarray = array();
        $buttonarray[] = & $mform->createElement('submit', 'resizepartitionbutton',
                                                  get_string('resizepartition', 'tool_beekeebox'));
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
    }
}

/**
 * Class restartshutdown_form
 *
 * Form class to restart and shutdown the BeekeeBox.
 *
 * @package    tool_beekeebox
 * @copyright  2016 onwards Nicolas Martignoni {@link mailto:nicolas@martignoni.net}
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class restartshutdown_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        $mform = $this->_form;
        $buttonarray = array();
        $buttonarray[] = & $mform->createElement('submit', 'restartbutton',
                                                  get_string('restart', 'tool_beekeebox'));
        $buttonarray[] = & $mform->createElement('submit', 'shutdownbutton',
                                                  get_string('shutdown', 'tool_beekeebox'));
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
    }
}
