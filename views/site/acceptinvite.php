<div class="login-container">
	<h1 class="content-subhead"><?php echo Yii::t('SpectreTheme', 'Create Your Account'); ?></h1>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'					=>	'login-form',
		'focus'					=>'	input[type="text"]:first',
		'enableAjaxValidation'	=>	true,
		'htmlOptions' => array(
			'class' => 'pure-form pure-form-stacked'
		)
	)); ?>
	<fieldset>
		<?php if ($model->hasErrors()): ?>
				<div class="alert alert-error" style="margin-bottom: -5px;">
				  	<?php echo $form->errorSummary($model); ?> 
				</div>
			<?php endif; ?>
		<div class="login-form-container">
			<?php echo $form->textField($model, 'email', array('placeholder' => Yii::t('SpectreTheme', 'Email Address'))); ?>
			<?php echo $form->textField($model, 'firstName', array('placeholder' => Yii::t('SpectreTheme', 'First Name'))); ?>
			<?php echo $form->textField($model, 'lastName', array('placeholder' => Yii::t('SpectreTheme', 'Last Name'))); ?>
			<?php echo $form->textField($model, 'displayName', array('placeholder' => Yii::t('SpectreTheme', 'Display Name'))); ?>
			<?php echo $form->passwordField($model, 'password', array('placeholder' => Yii::t('SpectreTheme', 'Password'))); ?>
		</div>
		<div class="login-form-footer">
			<?php echo CHtml::tag('button', array('type' => 'submit', 'id' => 'submit-comment', 'class' => 'pure-button pure-button-primary pure-button-xsmall pull-right'), Yii::t('SpectreTheme', 'Submit')); ?>
		</div>
	</fieldset>
	<?php $this->endWidget(); ?>
</div>