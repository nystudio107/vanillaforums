<?php
namespace Craft;

require_once(dirname(__FILE__).'/../library/jsConnectPHP/functions.jsconnect.php');

class Vanillaforums_UtilsService extends BaseApplicationComponent
{

/* --------------------------------------------------------------------------------
	Output the Vanillaforums SSO jsonp
-------------------------------------------------------------------------------- */

    public function outputSSO($userId = 0)
    {
		$result = "";
		$settings = craft()->plugins->getPlugin('vanillaforums')->getSettings();
		$data = array();
		
		$currentUser = craft()->userSession->user;
		if ($currentUser)
		{
			$data['uniqueid'] = $currentUser->id;
			$data['name'] = $currentUser->username;
			$data['email'] = $currentUser->email;
			if ($currentUser->getPhotoUrl())
				$data['photourl'] = $currentUser->getPhotoUrl();
		}
		
		$vanillaforumsClientID = $settings['vanillaforumsClientID'];
		$vanillaforumsSecret = $settings['vanillaforumsSecret'];

		$secure = true;
		
		//ob_start(); // Start output buffering
		
		\WriteJsConnect($data, $_GET, $vanillaforumsClientID, $vanillaforumsSecret, $secure);

		//$result = ob_get_contents(); // Store buffer in variable
		
		//ob_end_clean();
		
		return $result;
    } /* -- outputSSO */

/* --------------------------------------------------------------------------------
	Output the Vanillaforums SSO Embed string
-------------------------------------------------------------------------------- */

    public function outputSSOEmbed($userId = 0)
    {
		$result = "";
		$settings = craft()->plugins->getPlugin('vanillaforums')->getSettings();
		$data = array();
		
		$currentUser = craft()->userSession->user;
		if ($currentUser)
		{
			$data['uniqueid'] = $currentUser->id;
			$data['name'] = $currentUser->getFullName();
			$data['email'] = $currentUser->email;
			if ($currentUser->getPhotoUrl())
				$data['photourl'] = $currentUser->getPhotoUrl();
		}
		
		$vanillaforumsClientID = $settings['vanillaforumsClientID'];
		$vanillaforumsSecret = $settings['vanillaforumsSecret'];

		$secure = true;
				
		$result = \JsSSOString($data, $vanillaforumsClientID, $vanillaforumsSecret);
		
		return $result;
    } /* -- outputSSOEmbed */


} /* -- class Vanillaforums_UtilsService */