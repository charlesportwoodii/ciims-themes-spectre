<?php $info = Yii::app()->user->hasFlash('activation-info'); ?>

<div class="modal-container">
    <<h1 class="content-subhead"><?php echo Yii::t('themes.spectre.main', 'Activate your Account'); ?></h1>
    <p class="pull-text-left"><?php echo Yii::t('themes.spectre.main', 'Enter the password you registered with to activate your account.'); ?></p>
    <?php $form=$this->beginWidget('cii.widgets.CiiActiveForm', array(
        'id'					=> 'login-form',
        'focus'					=> 'input[type="text"]:first',
        'registerPureCss'       => false,
        'enableAjaxValidation'	=> true,
        'htmlOptions' => array(
            'class' => 'pure-form pure-form-stacked'
        )
    )); ?>
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('password') )); ?>

        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('themes.spectre.main', 'Submit'); ?></button>
        <div class="clearfix"></div>

    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
</div>
