<?php $content = &$data; ?>
<?php $meta = Content::model()->parseMeta($content->metadata); ?>
<div class="content no-padding" data-attr-id="<?php echo $content->id; ?>">
	<div class="post">
		<?php if (Cii::get(Cii::get($meta, 'blog-image', array()), 'value', '') != ""): ?>
			<p style="text-align:center;"><?php echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>
		<?php endif; ?>

		<div class="post-inner">
			<div class="post-header">
				<h2 class="post-title"><?php echo CHtml::link($content->title, Yii::app()->createUrl($content->slug)); ?></h2>
				
				<div class="clearfix"></div>
			</div>

			<p class="post-meta pull-left">
				<?php echo Yii::t('SpectreTheme.main', 'By {{author}} under {{category}}', array(
					'{{author}}' => CHtml::link(CHtml::encode($content->author->displayName), $this->createUrl("/profile/{$content->author->id}/"), array('class' => 'post-author')),
					'{{category}}' => CHtml::link(CHtml::encode($content->category->name), Yii::app()->createUrl($content->category->slug), array('class' => 'post-category post-category-design'))
				)); ?>
				<?php echo Cii::timeago($content->published); ?>
				<div class="icons">
					<div class="likes-container">
						<div class="likes <?php echo Yii::app()->user->isGuest ?: (Users::model()->findByPk(Yii::app()->user->id)->likesPost($content->id) ? 'liked' : NULL); ?>">     
						    <a href="#" id="upvote">
							<span class="counter">
							    <span id="like-count"><?php echo $content->like_count; ?></span>
							</span>      
						    </a>
						</div>
					</div>
				</div>
	        </p>
			<div class="clearfix"></div>
			<div class="post-description">
				<div id="md-output"><?php echo $content->safeOutput; ?></div>
				<textarea id="markdown" style="display:none;"><?php echo $content->content; ?></textarea>
			</div>
		</div>
	    <div style="clear:both;"><br /></div>
	</div>
</div>

<div class="post">
	<div class="post-inner">
		<?php $this->widget('ext.cii.widgets.comments.CiiCommentWidget'); ?>
	</div>
</div>

<?php Yii::app()->getClientScript()->registerScript('loadBlog', '$(document).ready(function() { Theme.loadBlog(' . $content->id . '); });'); ?>