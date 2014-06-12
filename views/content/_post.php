<?php $meta = Content::model()->parseMeta($content->metadata); ?>
<div class="post">
	<?php if (Cii::get(Cii::get($meta, 'blog-image', array()), 'value', '') != ""): ?>
		<p style="text-align:center;"><?php echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>
	<?php endif; ?>
	<div class="post-inner">
		<div class="post-header">
			<img class="post-avatar" src="<?php echo $content->author->gravatarImage(48); ?>" height="48" width="48">
			<h2 class="post-title"><?php echo CHtml::link($content->title, Yii::app()->createUrl($content->slug)); ?></h2>
		</div>
		<p class="post-meta">
			<?php echo Yii::t('SpectreTheme.main', 'By {{author}} under {{category}}', array(
				'{{author}}' => CHtml::link(CHtml::encode($content->author->displayName), $this->createUrl("/profile/{$content->author->id}/"), array('class' => 'post-author')),
				'{{category}}' => CHtml::link(CHtml::encode($content->category->name), Yii::app()->createUrl($content->category->slug), array('class' => 'post-category post-category-design'))
			)); ?>
			<time class="timeago" datetime="<?php echo date(DATE_ISO8601, strtotime($content->published)); ?>">
				<?php echo Cii::formatDate($content->published); ?>
			</time>
        </p>
        <div class="post-description">
			<?php $md = new CMarkdownParser; echo strip_tags($md->safeTransform($content->extract), '<h1><h2><h3><h4><h5><6h><p><b><strong><i>'); ?>
        </div>

		<a class="read-more-icon" style="float:right" href="<?php echo $this->createUrl('/' . $content->slug); ?>" rel="bookmark">
			<?php echo Yii::t('SpectreTheme', 'Read more'); ?>
		</a>
	</div>
    <div style="clear:both;"><br /></div>
</div>

<?php $this->widget('ext.timeago.JTimeAgo', array(
    'selector' => ' .timeago',
)); ?>