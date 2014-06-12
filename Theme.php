<?php

// Load the local autoloder if it exists
if (file_exists(__DIR__.DS.'vendor'.DS.'autoload.php'))
	require __DIR__.DS.'vendor'.DS.'autoload.php';

// Import CiiSettingsModel
Yii::import('application.modules.dashboard.components.CiiSettingModel');
class Theme extends CiiThemesModel
{
	/**
     * @var string  The theme name
     */
	public $theme = 'spectre';
}
