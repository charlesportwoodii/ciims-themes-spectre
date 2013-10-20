<?php $form=$this->beginWidget('CActiveForm', array(
		'id'					=>	'login-form',
		'focus'					=>'	input[type="text"]:first',
		'method'				=> 'get',
		'enableAjaxValidation'	=>	true,
		'htmlOptions' => array(
			'class' => 'pure-form pure-form-stacked'
		)
	)); ?>
	<div class="login-form-container">
		<?php echo CHtml::textField('q',  Cii::get($_GET, 'q', NULL), array('name' => 'q', 'placeholder' => Yii::t('SpectreTheme', 'Type, then press enter to search'))); ?>
		<?php echo CHtml::tag('button', array('type' => 'submit', 'id' => 'submit-comment', 'class' => 'pure-button pure-button-primary pure-button-xsmall pull-right'), Yii::t('SpectreTheme', 'Submit')); ?>
	</div>
<?php $this->endWidget(); ?>

<div class="clearfix"></div>
<hr />
<div id="posts">
	<?php if ($itemCount == 0): ?>
		<h1 class="content-subhead"><<?php echo Yii::t('SpectreTheme', "No Results Found"); ?></h1>			
		<p class="alert"><?php echo Yii::t('SpectreTheme', "Sorry, we tried looking but we didn't find a match for the specified criteria. Try refining your search."); ?></p>
	<?php endif; ?>
    <?php foreach ($data as $k=>$v): ?>
        <?php $this->renderPartial('//content/_post', array('content' => $v)); ?>
    <?php endforeach; ?>
</div>

<?php if ($itemCount != 0): ?>
	<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
	    'url'=>isset($url) ? $url : 'blog',
	    'contentSelector' => '#posts',
	    'pages' => $pages,
	    'param'=>array(
		    'getParam'=>'q',
		    'param'     => Cii::get($_GET, 'q', '')
		),
	    'defaultCallback' => "js:function(response, data) { 
	    	SpectreTheme.infoScroll(response, data);		    
 		}"
	)); ?>
	<?php Yii::app()->clientScript->registerScript('unbind-infinite-scroll', "$(document).ready(function() { SpectreTheme.loadAll(); });"); ?>

<?php endif; ?>
<META NAME="robots" CONTENT="noindex,nofollow">
