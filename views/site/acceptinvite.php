<div class="modal-container">
    <h1 class="content-subhead"><?php echo Yii::t('themes.spectre.main', 'Create Your Account'); ?></h1>
    <p class="pull-text-left"><?php echo Yii::t('themes.spectre.main', 'To accept your invitation, set your account details here.'); ?></p>
    <?php $form = $this->beginWidget('cii.widgets.CiiActiveForm', array(
        'id'					=>	'login-form',
        'registerPureCss'       => false,
        'focus'					=>'	input[type="text"]:first',
        'enableAjaxValidation'	=>	true,
        'htmlOptions' => array(
            'class' => 'pure-form pure-form-stacked'
        )
    )); ?>
    <?php if ($model->hasErrors()): ?>
            <div class="alert alert-danger pull-text-left">
                <?php echo $form->errorSummary($model); ?>
            </div>
        <?php endif; ?>
        <?php echo $form->textField($model, 'email', array('class' => 'pure-u-1', 'placeholder' => Yii::t('themes.spectre.main', 'Email Address'))); ?>
        <?php echo $form->textField($model, 'firstName', array('class' => 'pure-u-1', 'placeholder' => Yii::t('themes.spectre.main', 'First Name'))); ?>
        <?php echo $form->textField($model, 'lastName', array('class' => 'pure-u-1', 'placeholder' => Yii::t('themes.spectre.main', 'Last Name'))); ?>
        <?php echo $form->textField($model, 'displayName', array('class' => 'pure-u-1', 'placeholder' => Yii::t('themes.spectre.main', 'Display Name'))); ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'pure-u-1', 'placeholder' => Yii::t('themes.spectre.main', 'Password'))); ?>
    <div>
        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('themes.spectre.main', 'Submit'); ?></button>
        <div class="clearfix"></div>

    </div>
    <?php $this->endWidget(); ?>
</div>
