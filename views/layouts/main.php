<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="initial-scale=1.0">
	    <meta charset="UTF-8" />
	    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
	    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	    <?php Yii::app()->clientScript->registerMetaTag('text/html; charset=UTF-8', 'Content-Type', 'Content-Type', array(), 'Content-Type')
                                      ->registerMetaTag($this->keywords, 'keywords', 'keywords', array(), 'keywords')
                                      ->registerMetaTag(strip_tags($this->params['meta']['description']), 'description', 'description', array(), 'description')
                                      ->registerCssFile($this->asset . (YII_DEBUG ? '/css/spectre.css' : '/css/spectre.min.css'))
                                      ->registerCssFile($this->asset . (YII_DEBUG ? '/font-awesome/css/font-awesome.css' : '/font-awesome/css/font-awesome.min.css'))
		                              ->registerCoreScript('jquery')
								      ->registerScriptFile($this->asset .(YII_DEBUG ? '/js/spectre.js' : '/js/spectre.min.js'))
								      ->registerScript('load', '$(document).ready(function() { SpectreTheme.load(); });', CClientScript::POS_END); ?>
	</head>
	<body>		
		<main class="pure-g-r" id="layout">
			<div class="sidebar pure-u">
		        <header class="header">
		            <hgroup>
		                <h1 class="brand-title"><?php echo CHtml::link(CHtml::encode(Cii::getConfig('name')), $this->createAbsoluteUrl('/')); ?></h1>
		            </hgroup>
		        </header>
		        <footer class="footer">
		            <div class="pure-menu pure-menu-horizontal pure-menu-open">
		            	<div class="ciiims-logo">
			            	<img src="<?php echo $this->asset; ?>/images/ciims.png" />
			            </div>
		                <ul>
		                	<li>Copyright &copy <?php echo date('Y'); ?> <?php echo Cii::getConfig('name', Yii::app()->name); ?></li>
		                	<li>
		                		<?php echo Yii::t('SpecreTheme.main', 'Proudly Published with {{CiiMS}} - {{Spectre}}', array(
		                			'{{CiiMS}}' => CHtml::link('CiiMS', 'https://www.ciims.org/'),
		                			'{{Spectre}}' => CHtml::link('Spectre', 'https://github.com/charlesportwoodii/spectre')
		                		)); ?>
		                	</li>
		            	</ul>
		            </div>
		        </footer>
		    </div>
		    <div class="pure-u-1">
		    	<div class="content">
		            <?php echo $content; ?>

					<footer class="footer">
			            <div class="pure-menu pure-menu-horizontal pure-menu-open">
			                <ul>
			                	<li><?php echo CHtml::link(Yii::t('SpectreTheme.main', 'Search'), $this->createUrl('/search')); ?></li>
			                </ul>
			            </div>
			        </footer>
		        </div>	        
	        </div>
		</main>

		<span id="endpoint" data-attr-endpoint="<?php echo Yii::app()->getBaseUrl(true); ?>" style="display:none"></span>
	</body>
</html>
