<div class="modal-container">
    <h1 class="content-subhead"><?php echo Yii::t('SpectreTheme.main', 'Thanks for Activating Your Account!'); ?></h1>
    <p class="pull-text-left"><?php echo Yii::t('SpectreTheme.main', "You may now {{login}} and head to the {{dashboard}}", array(
        '{{login}}' => CHtml::link(Yii::t('SpectreTheme.main', 'login'), $this->createUrl('/login')),
        '{{dashboard}}' => CHtml::link(Yii::t('SpectreTheme.main', 'dashboard'), $this->createUrl('/dashboard'))
    )); ?></p>
</div>
