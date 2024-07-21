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
 * Language strings for local_plugindownloader
 * @copyright 2024 Khairu Aqsara <khairu@teruselearning.co.uk>
 * @package    local_plugindownloader
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Plugin Downloader';
$string['plugindownloader'] = 'Plugin Downloader';
$string['plugindownloader_desc'] = 'Download installed additional plugins as zip files.';
$string['selectplugins'] = 'Select Plugins';
$string['downloadselected'] = 'Download Selected Plugins';
$string['noadditionalplugins'] = 'No additional plugins found.';
$string['downloadsuccess'] = 'The selected plugins have been successfully downloaded.';
$string['downloaderror'] = 'An error occurred while downloading the plugins. Please try again.';
$string['enable'] = 'Enable Plugin Downloader';
$string['enable_desc'] = 'Toggle to enable or disable the Plugin Downloader functionality.';
$string['ziplimit'] = 'Maximum Plugins in ZIP';
$string['ziplimit_desc'] = 'Specify the maximum number of plugins that can be included in a single ZIP file.';
$string['exceededziplimit'] = 'You have selected more plugins than the allowed limit ({$a} plugins). Please reduce the number of selected plugins and try again.';
$string['nozipextension'] = 'The "zip" PHP extension is not installed. Please install or enable this extension to use the plugin downloader.';
