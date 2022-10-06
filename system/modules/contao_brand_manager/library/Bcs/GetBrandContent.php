<?php

/**
 * Bright Cloud Studio's Contao Brand Manager
 *
 * Copyright (C) 2021 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/contao-brand-manager
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
**/

namespace Bcs;
use Contao\DataContainer;
use Contao\ContentElement;

class GetBrandContent extends \System
{
	public function onReplaceTag (string $insertTag)
	{
		// if this tag doesnt contain :: it doesn't have an id, so we can stop right here
		if (stristr($insertTag, "::") === FALSE) {
			return 'Your tag has no ID. Please add a User ID or remove this tag from the page.';
		}

		// break our tag into an array
		$arrTag = explode("::", $insertTag);

		// lets make decisions based on the beginning of the tag
		switch($arrTag[0]) {
			case 'brand':
                switch($arrTag[1]) {
                    case 'name':
                        return 'This is the brand\'s name';
                    break;
                }
			break;
		}

		// something has gone horribly wrong, let the user know and hope for brighter lights ahead
		return 'Your tag is improperly formatted. Please try again.';
	}
}
