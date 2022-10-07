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

 /* Extend the tl_page palette */

$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = str_replace(';{publish_legend}', ';{brand_select_legend},brand_select;{publish_legend}', $GLOBALS['TL_DCA']['tl_page']['palettes']['root']);

$GLOBALS['TL_DCA']['tl_page']['fields']['brand'] = array
(
    'label'                     => &$GLOBALS['TL_LANG']['tl_page']['brand'],
    'inputType'                 => 'select',
    'default'                   => '',
    'options_callback'          => array('Bcs\Backend\Brands', 'optionsBrands'),
    'eval'                      => array('includeBlankOption'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql'                       => "varchar(255) NOT NULL default ''"
);

