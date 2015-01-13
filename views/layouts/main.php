<?php $cs = Yii::app()->clientScript; ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language; ?>">
	<head>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta name="viewport" content="initial-scale=1.0">
	    <meta charset="UTF-8" />
		<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no">
	    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<?php $cs->registerMetaTag('text/html; charset=UTF-8', 'Content-Type', 'Content-Type', array(), 'Content-Type')
                 ->registerMetaTag($this->keywords, 'keywords', 'keywords', array(), 'keywords')
                 ->registerMetaTag(strip_tags($this->params['meta']['description']), 'description', 'description', array(), 'description')
                 ->registerCssFile($this->asset . (YII_DEBUG ? '/dist/theme.css' : '/dist/theme.min.css'))
				 ->registerScriptFile($this->asset .(YII_DEBUG ? '/dist/theme.js' : '/dist/theme.min.js'))
				 ->registerScript('load', '$(document).ready(function() { Theme.load(); });', CClientScript::POS_END); ?>
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
		                		<?php echo Yii::t('themes.spectre.main', 'Proudly Published with {{CiiMS}} - {{Spectre}}', array(
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
			                	<li><?php echo CHtml::link(Yii::t('themes.spectre.main', 'Search'), $this->createUrl('/search')); ?></li>
			                </ul>
			            </div>
			        </footer>
		        </div>	        
	        </div>
		</main>

		<span id="endpoint" data-attr-endpoint="<?php echo Yii::app()->getBaseUrl(true); ?>" style="display:none"></span>
	</body>
</html>
