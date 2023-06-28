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
                            
                            // return the Brand's generated scss
                            case 'scss':
                                
                                $scss = \FilesModel::findByUuid($brand->scss);
                                return '<link rel="stylesheet" href="'.$scss->path.'?v='.rand(100000,999999).'">';
                            break;
                            
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
                            
                            // return the Brand's Navigation Module
                            case 'mobile_navigation_module':
                				return '{{insert_module::' . $brand->mobile_navigation_module . '}}';
                            break;

                            // return the Brand's Header Social Icon Module
                            case 'header_social_module':
                				return '{{insert_module::' . $brand->header_social_module . '}}';
                            break;

                            // return the Brand's Search Texr
                            case 'search_text':
                                return $brand->search_text;
                            break;

                        }
                        
                        
                        
                        
                        
                    }
                }

			break;
		}

        return false;
        
	}

}
