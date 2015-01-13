<?php $next = (isset($_GET['next']) ? '?next=' . $_GET['next'] : NULL); ?>
<div class="modal-container">
    <h1 class="content-subhead"><?php echo Yii::t('themes.spectre.main', 'Login to Your Account'); ?></h1>
    <?php $form=$this->beginWidget('cii.widgets.CiiActiveForm', array(
        'id'					=> 'login-form',
        'focus'					=> 'input[type="text"]:first',
        'registerPureCss'       => false,
        'enableAjaxValidation'	=> true,
        'action'                => $this->createUrl('/login') . $next,
        'htmlOptions' => array(
            'class' => 'pure-form pure-form-stacked'
        )
    )); ?>

    <?php if (!Yii::app()->user->isGuest): ?>
        <div class="alert alert-info">
            <?php echo Yii::t('themes.spectre.main', "{{headsup}} Looks like you're already logged in as {{email}}. You should {{logout}} before logging in to another account.", array(
                    '{{headsup}}' => CHtml::tag('strong', array(), Yii::t('themes.spectre.main', 'Heads Up!')),
                    '{{email}}'   => CHtml::tag('strong', array(), Yii::app()->user->email),
                    '{{logout}}'  => CHtml::tag('strong', array(), CHtml::link(Yii::t('themes.spectre.main', 'logout'), $this->createUrl('/logout')))
                )); ?>
         </div>
    <?php else: ?>
        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textField($model, 'username', array('class' => 'pure-u-1', 'id'=>'email', 'placeholder'=> $model->GetAttributeLabel('username') )); ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'pure-u-1', 'id'=>'password', 'placeholder'=> $model->GetAttributeLabel('password') )); ?>

        <div class="pull-left">
            <?php echo CHtml::link(Yii::t('themes.spectre.main', 'register'), $this->createUrl('/register')); ?>
            <span> | </span>
            <?php echo CHtml::link(Yii::t('themes.spectre.main', 'forgot'), $this->createUrl('/forgot')); ?>
        </div>
        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('themes.spectre.main', 'Submit'); ?></button>
        <div class="clearfix"></div>
    <?php endif; ?>

    <!-- Social Icons -->
    <?php if (Yii::app()->user->isGuest): ?>
        <?php if (count(Cii::getHybridAuthProviders()) >= 1): ?>
        <div class="clearfix" style="border-bottom: 1px solid #aaa; margin: 15px;"></div>
            <span class="login-form-links"><?php echo Yii::t('themes.spectre.main', 'Or sign in with one of these social networks'); ?></span>
        <?php endif; ?>
        <div class="clearfix"></div>
        <div class="social-buttons">
            <?php foreach (Cii::getHybridAuthProviders() as $k=>$v): ?>
                <?php if (Cii::get($v, 'enabled', false) == 1): ?>
                    <?php echo CHtml::link(NULL, $this->createUrl('/hybridauth/'.$k) . $next, array('class' => 'social-icons ' . strtolower($k))); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
</div>
