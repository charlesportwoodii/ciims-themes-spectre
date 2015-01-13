<div class="modal-container">
   <h1 class="content-subhead"><?php echo Yii::t('themes.spectre.main.main', 'Reset Your Password'); ?></h1>
    <p class="pull-text-left"><?php echo Yii::t('themes.spectre.main.main', 'Enter your new password twice to reset your password.'); ?></p>
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
        <?php echo $form->passwordField($model, 'password_repeat', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('password_repeat') )); ?>

        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('themes.spectre.main.main', 'Submit'); ?></button>
        <div class="clearfix"></div>

    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
</div>
