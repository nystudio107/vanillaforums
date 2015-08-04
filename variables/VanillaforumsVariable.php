<?php
namespace Craft;

class VanillaforumsVariable
{

/* --------------------------------------------------------------------------------
	Variables
-------------------------------------------------------------------------------- */

    function vanillaforumsSSO($userId = 0)
    {
		return craft()->vanillaforums_utils->outputSSO($userId);
    } /* -- vanillaforumsSSO */

    function vanillaforumsSSOEmbed($userId = 0)
    {
		return craft()->vanillaforums_utils->outputSSOEmbed($userId);
    } /* -- vanillaforumsSSO */

}