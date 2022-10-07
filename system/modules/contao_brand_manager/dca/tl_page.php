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

$GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = str_replace(';{publish_legend}', ';{page_tag_navigation_legend},page_tag_navigation_target,page_tag_navigation_anchor_target;{publish_legend}', $GLOBALS['TL_DCA']['tl_page']['palettes']['regular']);

$GLOBALS['TL_DCA']['tl_page']['fields']['brand'] = array
(
  'sql'                   => "varchar(255) NOT NULL default ''",
  'label'			        => &$GLOBALS['TL_LANG']['tl_page']['page_tag_navigation_target'],
  'inputType'             => 'radio',
  'options_callback'	    => array('Bcs\Backend\ChildCategoryBackend', 'getChildCategories'),										
  'eval'                  => array('multiple'=>true, 'mandatory'=>false,'tl_class'=>'w50') 
);

$GLOBALS['TL_DCA']['tl_page']['fields']['page_tag_navigation_anchor_target'] = array
(
	'label'			        => &$GLOBALS['TL_LANG']['tl_page']['page_tag_navigation_anchor_target'],
	'inputType'             => 'text',
    'default'               => '',
    'search'                => true,
    'eval'                  => array('mandatory'=>false, 'tl_class'=>'w50'),
    'sql'                   => "varchar(255) NOT NULL default ''"
);
