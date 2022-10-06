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


/* Register Classes */
ClassLoader::addClasses(array
(
    'Bcs\GetBrandContent' 		=> 'system/modules/contao_brand_manager/library/Bcs/GetBrandContent.php',
    'Bcs\Backend\Brands' 		=> 'system/modules/contao_brand_manager/library/Bcs/Backend/Brands.php',
    'Bcs\Model\Brand' 			=> 'system/modules/contao_brand_manager/library/Bcs/Model/Brand.php',
    'Bcs\Brands'		 		=> 'system/modules/contao_brand_manager/library/Bcs/Brands.php'
));
