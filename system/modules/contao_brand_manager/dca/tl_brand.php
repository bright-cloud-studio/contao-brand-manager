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

 
/* Table tl_location */
$GLOBALS['TL_DCA']['tl_brand'] = array
(
 
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' 	=> 	'primary',
                'alias' =>  'index'
            )
        )
    ),
 
    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('name'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('name'),
            'format'                  => '%s'
        ),
        'global_operations' => array
        (
            'export' => array
            (
                'label'               => 'Export Brands CSV',
                'href'                => 'key=exportBrands',
                'icon'                => 'system/modules/contao_brand_manager/assets/icons/file-export-icon-16.png'
            ),
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )

        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_brand']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
			
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_brand']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_brand']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'toggle' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['tl_brand']['toggle'],
			'icon'                => 'visible.gif',
			'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
			'button_callback'     => array('Bcs\Backend\Brands', 'toggleIcon')
		),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_brand']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ),
 
    // Palettes
    'palettes' => array
    (
        'default'                     => '{brand_legend},name,logo,color_primary,color_secondary,scss;{header_legend},navigation_module,mobile_navigation_module;{publish_legend},published;'
    ),
 
    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql'                     		=> "int(10) unsigned NOT NULL default '0'"
        ),
		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_brand']['alias'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('unique'=>true, 'rgxp'=>'alias', 'doNotCopy'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('Bcs\Backend\Brands', 'generateAlias')
			),
			'sql'                     => "varchar(128) COLLATE utf8_bin NOT NULL default ''"

		),
        

        
        
        
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_brand']['name'],
			'inputType'               => 'text',
			'default'		  => '',
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
        'logo' => array
		(
            'label'                     => &$GLOBALS['TL_LANG']['tl_brand']['logo'],
            'inputType'                 => 'fileTree',
            'default'                   => '',
            'search'                    => true,
            'eval'                      => [
                                            'mandatory' => true,
                                            'fieldType' => 'radio', 
                                            'filesOnly' => true
                                        ],
            'sql'                       => ['type' => 'binary', 'length' => 16, 'notnull' => false, 'fixed' => true]
		),
        'scss' => array
		(
            'label'                     => &$GLOBALS['TL_LANG']['tl_brand']['scss'],
            'inputType'                 => 'fileTree',
            'default'                   => '',
            'search'                    => true,
            'eval'                      => [
                                            'mandatory' => true,
                                            'fieldType' => 'radio', 
                                            'filesOnly' => true,
                                            'extensions' => 'scss,css'
                                        ],
            'sql'                       => ['type' => 'binary', 'length' => 16, 'notnull' => false, 'fixed' => true]
		),

        
        
        
        
        
        'navigation_module' => array
		(
            'label'                     => &$GLOBALS['TL_LANG']['tl_brand']['navigation_module'],
			'inputType'                 => 'select',
			'default'                   => '',
			'options_callback'          => array('Bcs\Backend\Brands', 'optionsNavigationModules'),
			'eval'                      => array('includeBlankOption'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
			'sql'                       => "varchar(255) NOT NULL default ''"
		),
        
        
          'mobile_navigation_module' => array
		(
            'label'                     => &$GLOBALS['TL_LANG']['tl_brand']['mobile_navigation_module'],
			'inputType'                 => 'select',
			'default'                   => '',
			'options_callback'          => array('Bcs\Backend\Brands', 'optionsMobileNavigationModules'),
			'eval'                      => array('includeBlankOption'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
			'sql'                       => "varchar(255) NOT NULL default ''"
		),      
        
        
        
        
		'published' => array
		(
			'exclude'                 => true,
			'label'                   => &$GLOBALS['TL_LANG']['tl_brand']['published'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true, 'doNotCopy'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		)		
    )
);
