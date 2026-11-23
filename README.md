# Module Reuse Plugin

The **Module Reuse** Plugin is an extension for [Grav CMS](https://github.com/getgrav/grav).
Create one module and display it on multiple modular pages.
Plugin adds a new module template, where you can select any other module to show in that place.
This way you can create one module and show it on multiple modular pages or even in the same page multiple times.
Edit once - change everywhere.

## Installation

Installing the Module Reuse plugin can be done in one of three ways: The GPM (Grav Package Manager) installation
method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](https://learn.getgrav.org/cli-console/grav-cli-gpm), through your system's terminal (also called the command line), navigate to
the root of your Grav-installation, and enter:

    bin/gpm install module-reuse

This will install the Module Reuse plugin into your `/user/plugins`-directory within Grav. Its files can be found
under `/your/site/grav/user/plugins/module-reuse`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under
`/your/site/grav/user/plugins`. Then rename the folder to `module-reuse`. You can find these files on
[GitHub](https://github.com//grav-plugin-module-reuse) or via [GetGrav.org](https://getgrav.org/downloads/plugins).

You should now have all the plugin files under

    /your/site/grav/user/plugins/module-reuse

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on
the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/module-reuse/module-reuse.yaml` to
`user/config/plugins/module-reuse.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
root: /root
```

Note that if you use the Admin Plugin, a file with your configuration named module-reuse.yaml will be saved in the
`user/config/plugins/` folder once the configuration is saved in the Admin.

## Usage

When creating a module in the Admin, select the *Module reuse* template (or define `module: /path/to/module` in the
`module-reuse.md` header). This will show a dropdown on the *Content* tab, where you will select any other module.
That selected module will be shown in the place of your newly created module.

For example, if you have a lot of modules you would like to reuse, you could create a separate unlisted/invisible
modular page, and add all your modules to it. In the config define `root` path to that page. Then only these modules
will be listed in the dropdown of a *Module reuse* item
