<?php
/**
 * Section Entries Deleter plugin for Craft CMS
 *
 * Delete all entries in a section, quickly.
 *
 * --snip--
 * Craft plugins are very much like little applications in and of themselves. We’ve made it as simple as we can,
 * but the training wheels are off. A little prior knowledge is going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL, as well as some semi-
 * advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 * --snip--
 *
 * @author    Fred Carlsen
 * @copyright Copyright (c) 2016 Fred Carlsen
 * @link      http://sjelfull.no
 * @package   SectionEntriesDeleter
 * @since     1.0.0
 */

namespace Craft;

class SectionEntriesDeleterPlugin extends BasePlugin
{
    /**
     * Called after the plugin class is instantiated; do any one-time initialization here such as hooks and events:
     *
     * craft()->on('entries.saveEntry', function(Event $event) {
     *    // ...
     * });
     *
     * or loading any third party Composer packages via:
     *
     * require_once __DIR__ . '/vendor/autoload.php';
     *
     * @return mixed
     */
    public function init()
    {
    }

    /**
     * Returns the user-facing name.
     *
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Section Entries Deleter');
    }

    /**
     * Plugins can have descriptions of themselves displayed on the Plugins page by adding a getDescription() method
     * on the primary plugin class:
     *
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Delete all entries in a section, quickly.');
    }

    /**
     * Plugins can have links to their documentation on the Plugins page by adding a getDocumentationUrl() method on
     * the primary plugin class:
     *
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/sjelfull/sectionentriesdeleter/blob/master/README.md';
    }

    /**
     * Plugins can now take part in Craft’s update notifications, and display release notes on the Updates page, by
     * providing a JSON feed that describes new releases, and adding a getReleaseFeedUrl() method on the primary
     * plugin class.
     *
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/sjelfull/sectionentriesdeleter/master/releases.json';
    }

    /**
     * Returns the version number.
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * As of Craft 2.5, Craft no longer takes the whole site down every time a plugin’s version number changes, in
     * case there are any new migrations that need to be run. Instead plugins must explicitly tell Craft that they
     * have new migrations by returning a new (higher) schema version number with a getSchemaVersion() method on
     * their primary plugin class:
     *
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * Returns the developer’s name.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Fred Carlsen';
    }

    /**
     * Returns the developer’s website URL.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://sjelfull.no';
    }

    /**
     * Returns whether the plugin should get its own tab in the CP header.
     *
     * @return bool
     */
    public function hasCpSection()
    {
        return true;
    }

    /**
     * Called right before your plugin’s row gets stored in the plugins database table, and tables have been created
     * for it based on its records.
     */
    public function onBeforeInstall()
    {
    }

    /**
     * Called right after your plugin’s row has been stored in the plugins database table, and tables have been
     * created for it based on its records.
     */
    public function onAfterInstall()
    {
    }

    /**
     * Called right before your plugin’s record-based tables have been deleted, and its row in the plugins table
     * has been deleted.
     */
    public function onBeforeUninstall()
    {
    }

    /**
     * Called right after your plugin’s record-based tables have been deleted, and its row in the plugins table
     * has been deleted.
     */
    public function onAfterUninstall()
    {
    }

    /**
     * Defines the attributes that model your plugin’s available settings.
     *
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'someSetting' => array(AttributeType::String, 'label' => 'Some Setting', 'default' => ''),
        );
    }

    /**
     * Returns the HTML that displays your plugin’s settings.
     *
     * @return mixed
     */
    public function getSettingsHtml()
    {
       return craft()->templates->render('sectionentriesdeleter/SectionEntriesDeleter_Settings', array(
           'settings' => $this->getSettings()
       ));
    }

    public function registerCpRoutes()
    {
        return array(
            'sectionentriesdeleter'                            => array('action' => 'SectionEntriesDeleter/index'),
        );
    }

    /**
     * If you need to do any processing on your settings’ post data before they’re saved to the database, you can
     * do it with the prepSettings() method:
     *
     * @param mixed $settings  The Widget's settings
     *
     * @return mixed
     */
    public function prepSettings($settings)
    {
        // Modify $settings here...

        return $settings;
    }

}