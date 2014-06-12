<div class="login-container">
	<h1 class="content-subhead"><?php echo Yii::t('SpectreTheme', 'Update Your Profile'); ?></h1>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'					=>	'login-form',
		'focus'					=>'	input[type="text"]:first',
		'enableAjaxValidation'	=>	true,
		'htmlOptions' => array(
			'class' => 'pure-form pure-form-stacked'
		)
	)); ?>

	<fieldset>
		<div class="login-form-container">
			<?php echo $form->errorSummary($model); ?>
			    
			<?php echo $form->textField($model,'email',array('class'=>'span12','maxlength'=>255)); ?>        
			<?php echo $form->passwordField($model,'password',array('value'=>'', 'class'=>'span12','maxlength'=>64, 'placeholder' => Yii::t('SpectreTheme', 'Set a password here to change. Leave blank to keep existing password.'))); ?>    
			<?php echo $form->textField($model,'displayName',array('class'=>'span12','maxlength'=>255)); ?>    
			<?php echo $form->textField($model,'firstName',array('class'=>'span12','maxlength'=>255)); ?>        
			<?php echo $form->textField($model,'lastName',array('class'=>'span12','maxlength'=>255)); ?>
			<?php echo $form->textArea($model, 'about', array('class' => 'span12')); ?>
		</div>
		<div class="login-form-footer">
			<?php echo CHtml::tag('button', array('type' => 'submit', 'id' => 'submit-comment', 'class' => 'pure-button pure-button-primary pure-button-xsmall pull-right'), Yii::t('SpectreTheme', 'Submit')); ?>
		</div>
	</fieldset>
	<?php $this->endWidget(); ?>
</div>

<style>
	textarea {
		width: 100%;
		height: 100px;
	}
</style>