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
 * Download selected plugins as a zip
 * @copyright 2024 Khairu Aqsara <khairu@teruselearning.co.uk>
 * @package    local_plugindownloader
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 require_once('../../config.php');
 require_once($CFG->libdir . '/adminlib.php');
 require_once($CFG->libdir . '/filelib.php');
 require_once($CFG->libdir . '/filestorage/file_storage.php');

require_login();
require_sesskey();
require_capability('moodle/site:config', context_system::instance());

$plugins = required_param_array('plugins', PARAM_RAW);
$filestozip = [];

foreach ($plugins as $pluginname) {
    $plugininfo = explode(":", base64_decode($pluginname));
    $plugindir = core_component::get_plugin_directory($plugininfo[1], $plugininfo[0]);
    if (is_dir($plugindir)) {
        $filestozip[$plugininfo[0]] = $plugindir;
    }
}

// Create a temporary file for the ZIP archive.
$tempdir = make_temp_directory('local_plugindownloader');
$zipfilename = tempnam($tempdir, 'plugins_') . '.zip';

$zipper = new zip_packer();
if ($zipper->archive_to_pathname($filestozip, $zipfilename)) {
    // Send the zip file to the browser for download.
    send_temp_file($zipfilename, 'plugins.zip');
} else {
    echo $OUTPUT->header();
    echo $OUTPUT->notification(get_string('failedtoarchive', 'local_plugindownloader'), 'notifyproblem');
    echo $OUTPUT->footer();
    exit;
}

echo $OUTPUT->footer();
exit;
