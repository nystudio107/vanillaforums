<?php 
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class VanillaforumsTwigExtension extends \Twig_Extension
{

/* --------------------------------------------------------------------------------
	Expose our filters and functions
-------------------------------------------------------------------------------- */

    public function getName()
    {
        return 'Vanillaforums';
    }

/* -- Return our twig filters */

    public function getFilters()
    {
        return array(
            'vanillaforumsSSO' => new \Twig_Filter_Method($this, 'vanillaforumsSSO_filter'),
            'vanillaforumsSSOEmbed' => new \Twig_Filter_Method($this, 'vanillaforumsSSOEmbed_filter'),
        );
    } /* -- getFilters */

/* -- Return our twig functions */

    public function getFunctions()
    {
        return array(
            'vanillaforumsSSO' => new \Twig_Function_Method($this, 'vanillaforumsSSO_filter'),
            'vanillaforumsSSOEmbed' => new \Twig_Function_Method($this, 'vanillaforumsSSOEmbed_filter'),
        );
    } /* -- getFunctions */

/* --------------------------------------------------------------------------------
	Filters
-------------------------------------------------------------------------------- */

    function vanillaforumsSSO_filter($userId = 0)
    {
		return craft()->vanillaforums_utils->outputSSO($userId);
    } /* -- vanillaforumsSSO_filter */

    function vanillaforumsSSOEmbed_filter($userId = 0)
    {
		return craft()->vanillaforums_utils->outputSSOEmbed($userId);
    } /* -- vanillaforumsSSOEmbed_filter */

} /* -- VanillaforumsTwigExtension */
