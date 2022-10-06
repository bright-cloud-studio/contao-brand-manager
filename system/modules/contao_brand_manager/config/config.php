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

/* Back end modules */
$GLOBALS['BE_MOD']['content']['brands'] = array(
	'tables' => array('tl_brand'),
	'icon'   => 'system/modules/contao_brand_manager/assets/icons/brand.png',
	'exportLocations' => array('Bcs\Backend\Brands', 'exportBrands')
);

/* Models */
$GLOBALS['TL_MODELS']['tl_brand'] = 'Bcs\Model\Brand';

/* Hooks */
if (\Config::getInstance()->isComplete()) {
  $GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('Bcs\GetBrandContent', 'onReplaceTag');
}
