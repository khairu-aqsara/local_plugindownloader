# Plugin Downloader for Moodle

## Overview

The **Plugin Downloader** is a Moodle plugin that allows administrators to easily download additional plugins. This plugin provides an interface to select and download multiple plugins in a zip format, facilitating easier plugin management.

## Features

- **List Additional Plugins**: Displays a list of additional plugins available for download.
- **Batch Download**: Select multiple plugins and download them as a single zip file.
- **Compatibility Check**: Ensures compatibility with the Moodle version before downloading plugins.

## Requirements

- Moodle 3.x or later
- PHP 7.0 or later

## Installation

1. **Download the plugin**:
   - Clone the repository: `git clone https://github.com/khairu-aqsara/local_plugindownloader.git`
   - Alternatively, download the zip file.

2. **Copy the Plugin**:
   - Place the `local_plugindownloader` directory in the `local/` directory of your Moodle instance.

3. **Install the Plugin**:
   - Log in to your Moodle site as an administrator.
   - Navigate to **Site administration > Notifications**.
   - Follow the on-screen instructions to complete the installation.

## Configuration

To configure the Plugin Downloader:

1. **Navigate to Settings**:
   - Go to **Site administration > Plugins > Local plugins > Plugin Downloader**.

2. **Set Zip Limit**:
   - Configure the maximum size limit for the zip file using the `Zip limit` setting.

## Usage

1. **Access the Plugin**:
   - Go to **Site administration > Local plugins > Plugin Downloader**.

2. **Select Plugins**:
   - A list of additional plugins will be displayed. Select the plugins you wish to download.

3. **Download**:
   - Click on the **Download Selected** button to download the zip file containing the selected plugins.

## License

This plugin is licensed under the GNU General Public License v3.0. See [LICENSE](http://www.gnu.org/copyleft/gpl.html) for more details.

## Author

**Khairu Aqsara** - [khairu@teruselearning.co.uk](mailto:khairu@teruselearning.co.uk)

## Acknowledgments

- Based on the Moodle Plugin Development Guide.
- Thanks to the Moodle community for their support and contributions.

