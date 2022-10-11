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
	    global $objPage;
	    $selectedBrand = 0;
	    $rp = \Database::getInstance()->prepare("SELECT * FROM tl_page WHERE id = '".$objPage->rootId."'")->execute(); 
        if ($rp->numRows > 0)
		{
		    while($rp->next()) {
		        $selectedBrand = $rp->brand_select;
		    }
		}
	    
	    $buffer = '';
	    
		// if this tag doesnt contain :: it doesn't have an id, so we can stop right here
		if (stristr($insertTag, "::") === FALSE) {
			return 'Your tag has no ID. Please add a User ID or remove this tag from the page.';
		}

		// break our tag into an array
		$arrTag = explode("::", $insertTag);

		// lets make decisions based on the beginning of the tag
		switch($arrTag[0]) {
			case 'brand':
			    
			    // Get Brand from db
			    $brand = \Database::getInstance()->prepare("SELECT * FROM tl_brand WHERE id = '".$selectedBrand."'")->execute(); 
                if ($brand->numRows > 0)
				{
				    while($brand->next()) {
                        
                        
                        
                        
                        
                        
                        switch($arrTag[1]) {
                            
                            // return the Brand's Name
                            case 'name':
                                return $brand->name;
                            break;
                            
                            // return the Brand's logo
                            case 'logo':
                                $logo = \FilesModel::findByUuid($brand->logo);
                                return $logo->path;
                            break;
                            
                            // return the Brand's Navigation Module
                            case 'navigation_module':
                				return '{{insert_module::' . $brand->navigation_module . '}}';
                            break;
                        }
                        
                        
                        
                        
                        
                    }
                }

			break;
		}

        return $buffer;
		// something has gone horribly wrong, let the user know and hope for brighter lights ahead
		return 'Your tag is improperly formatted. Please try again.';
	}
    
    public function generateBrandSCSS (&$objBuffer, $objTemplate) {
        
        echo $objBuffer;
        die();

    }
}
