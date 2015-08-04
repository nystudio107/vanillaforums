<?php
namespace Craft;

class VanillaforumsPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Vanillaforums');
    }

    function getVersion()
    {
        return '1.0.0';
    }

    function getDeveloper()
    {
        return 'Megalomaniac';
    }

    function getDeveloperUrl()
    {
        return 'http://www.megalomaniac.com';
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