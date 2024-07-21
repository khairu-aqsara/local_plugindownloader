<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin downloader settings
 * @copyright 2024 Khairu Aqsara <khairu@teruselearning.co.uk>
 * @package    local_plugindownloader
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_plugindownloader', get_string('plugindownloader', 'local_plugindownloader'));

    // Example setting: Enable the plugin downloader (on/off).
    $settings->add(new admin_setting_configcheckbox(
        'local_plugindownloader/enable',
        get_string('enable', 'local_plugindownloader'),
        get_string('enable_desc', 'local_plugindownloader'),
        1
    ));

    // Example setting: Define a zip download limit (number of plugins).
    $settings->add(new admin_setting_configtext(
        'local_plugindownloader/ziplimit',
        get_string('ziplimit', 'local_plugindownloader'),
        get_string('ziplimit_desc', 'local_plugindownloader'),
        10,
        PARAM_INT
    ));

    // Add the settings page to the local plugins category.
    $ADMIN->add('localplugins', $settings);
}
