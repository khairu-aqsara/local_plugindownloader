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
 * Renderer for the Plugin Downloader
 *
 * This renderer handles the display of the main page for the plugin downloader,
 * including listing additional plugins, and handling the zip limit validation.
 * @copyright 2024 Khairu Aqsara <khairu@teruselearning.co.uk>
 * @package    local_plugindownloader
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_plugindownloader_renderer extends plugin_renderer_base {
    /**
     * Render the main page for the plugin downloader.
     *
     * @param array $additional_plugins Array of additional plugins.
     * @return string HTML to display.
     */
    public function render_main_page($additionalplugins) {
        $data = new stdClass();
        $data->additional_plugins = !empty($additionalplugins);
        $data->plugins = [];

        $ziplimit = get_config('local_plugindownloader', 'ziplimit');

        foreach ($additionalplugins as $plugin) {
            $data->plugins[] = (object)[
                'name' => $plugin['displayname'],
                'component' => base64_encode("{$plugin['name']}:{$plugin['type']}"),
            ];
        }

        $data->sesskey = sesskey();
        $data->downloadaction = new moodle_url('/local/plugindownloader/download.php');
        $data->selectplugins = get_string('selectplugins', 'local_plugindownloader');
        $data->downloadselected = get_string('downloadselected', 'local_plugindownloader');
        $data->noadditionalplugins = get_string('noadditionalplugins', 'local_plugindownloader');
        $data->exceededziplimitmsg = get_string('exceededziplimit', 'local_plugindownloader', $ziplimit);

        return $this->render_from_template('local_plugindownloader/main', $data);
    }
}
