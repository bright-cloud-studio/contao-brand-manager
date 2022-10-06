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

/* Hooks */
if (\Config::getInstance()->isComplete()) {
  $GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('bcs\GetBrandContent', 'onReplaceTag');
}
