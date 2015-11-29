<?php
namespace Craft;

class VanillaforumsPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Vanillaforums');
    }

    public function getDescription()
    {
        return 'Single Sign On plugin for VanillaForums/jsConnect and CraftCMS.';
    }
    
    public function getDocumentationUrl()
    {
        return 'https://github.com/khalwat/vanillaforums/blob/master/README.md';
    }
    
    public function getReleaseFeedUrl()
    {
        return 'https://github.com/khalwat/vanillaforums/blob/master/releases.json';
    }
    
    public function getVersion()
    {
        return '1.0.1';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    function getDeveloper()
    {
        return 'nystudio107';
    }

    function getDeveloperUrl()
    {
        return 'http://nystudio107.com';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.vanillaforums.twigextensions.VanillaforumsTwigExtension');

        return new VanillaforumsTwigExtension();
    }

    protected function defineSettings()
    {
        return array(
            'vanillaforumsClientID' => array(AttributeType::String, 'label' => 'Vanilla Forums jsConnect Client ID', 'default' => ''),
            'vanillaforumsSecret' => array(AttributeType::String, 'label' => 'Vanilla Forums jsConnect Secret', 'default' => ''),
        );
    }

    public function getSettingsHtml()
    {
       return craft()->templates->render('vanillaforums/settings', array(
           'settings' => $this->getSettings()
       ));
    }

}