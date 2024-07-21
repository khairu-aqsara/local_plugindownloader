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
 * Version details
 * @copyright 2024 Khairu Aqsara <khairu@teruselearning.co.uk>
 * @package    local_plugindownloader
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_plugindownloader'; // Full name of the plugin (used for diagnostics).
$plugin->version   = 2024072120;               // The current plugin version (Date: YYYYMMDDXX).
$plugin->requires  = 2021051700;               // Requires this Moodle version (3.11).
$plugin->maturity  = MATURITY_STABLE;          // This is considered as ready for production sites.
$plugin->release   = '1.0.0';                  // This is our first release.
$plugin->dependencies = [];               // No dependencies on other plugins.
