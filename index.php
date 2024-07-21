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

// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.

/**
 * Main page for the Plugin Downloader
 * @copyright 2024 Khairu Aqsara <khairu@teruselearning.co.uk>
 * @package    local_plugindownloader
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->libdir . '/filelib.php');

// Ensure the user is logged in.
require_login();
if (!is_siteadmin()) {
    throw new moodle_exception('Access Denied');
}

// Page setup.
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/plugindownloader/index.php'));
$PAGE->set_title(get_string('pluginname', 'local_plugindownloader'));
$PAGE->set_heading(get_string('pluginname', 'local_plugindownloader'));

// Check capabilities.
require_capability('moodle/site:config', $context);

echo $OUTPUT->header();

// Fetch all installed plugins, excluding core plugins.
$pluginman = core_plugin_manager::instance();
$installedplugins = $pluginman->get_plugins();
$additionalplugins = [];

foreach ($installedplugins as $type => $plugins) {
    foreach ($plugins as $name => $plugin) {
        if (empty($plugin->is_standard())) {
            $rsplugin = [
                'type' => $type,
                'name' => $name,
                'typerootdir' => $plugin->typerootdir,
                'rootdir' => $plugin->rootdir,
                'displayname' => $plugin->displayname,
                'versiondisk' => $plugin->versiondisk,
            ];
            array_push($additionalplugins, $rsplugin);
        }
    }
}

if (empty($additionalplugins)) {
    echo $OUTPUT->notification(get_string('noadditionalplugins', 'local_plugindownloader'), 'notifiyproblem');
} else if (!extension_loaded('zip')) { // Ensure the space between 'else if' and '('.
    echo $OUTPUT->notification(get_string('nozipextension', 'local_plugindownloader'), 'notifyproblem');
} else {
    $renderer = $PAGE->get_renderer('local_plugindownloader');
    echo $renderer->render_main_page($additionalplugins);
}

echo $OUTPUT->footer();
