<?php $info = Yii::app()->user->hasFlash('activation-info'); ?>
<div class="login-container">
	<h1 class="content-subhead"><?php echo Yii::t('SpectreTheme', 'Activate your Account'); ?></h1>
	<?php if(Yii::app()->user->hasFlash('activation-error')):?>
		<div class="alert alert-error" style="margin-top: 20px;">
		  	<?php echo Yii::app()->user->getFlash('activation-error'); ?>
		</div>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->hasFlash('activation-success')):?>
		<div class="alert alert-success" style="margin-top: 20px;">
		  	<?php echo Yii::app()->user->getFlash('activation-success'); ?>
		</div>
	<?php endif; ?>

	<?php if($info):?>
		<div class="alert alert-info" style="margin-top: 20px;">
		  	<?php echo Yii::app()->user->getFlash('activation-info'); ?>
		</div>
	<?php endif; ?>

	<?php if ($info):?>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'					=>	'login-form',
			'focus'					=>'	input[type="text"]:first',
			'enableAjaxValidation'	=>	true,
			'htmlOptions' => array(
				'class' => 'pure-form pure-form-stacked'
			)
		)); ?>
		<div class="login-form-container">
			<?php echo CHtml::passwordField('password', Cii::get($_POST, 'password', NULL), array('placeholder' => Yii::t('SpectreTheme', 'Password'))); ?>
			<?php echo CHtml::tag('button', array('type' => 'submit', 'id' => 'submit-comment', 'class' => 'pure-button pure-button-primary pure-button-xsmall pull-right'), Yii::t('SpectreTheme', 'Submit')); ?>
		</div>
		<?php $this->endWidget(); ?>
	<?php endif; ?>
</div>