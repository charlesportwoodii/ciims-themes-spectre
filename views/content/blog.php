<?php $content = &$data; ?>
<?php $meta = Content::model()->parseMeta($content->metadata); ?>
<div class="content no-padding" data-attr-id="<?php echo $content->id; ?>">
	<div class="post">
		<?php if (Cii::get(Cii::get($meta, 'blog-image', array()), 'value', '') != ""): ?>
			<p style="text-align:center;"><?php echo CHtml::image(Yii::app()->baseUrl . $meta['blog-image']['value'], NULL, array('class'=>'image')); ?></p>
		<?php endif; ?>

		<div class="likes-container likes-container--topfix pull-right">
			<div class="likes <?php echo Yii::app()->user->isGuest ?: (Users::model()->findByPk(Yii::app()->user->id)->likesPost($content->id) ? 'liked' : NULL); ?>">     
			    <a href="#" id="upvote" title="Like this post and discussion">
			    	<span class="icon-heart icon-red"></span>
			        <span class="counter">
			            <span id="like-count"><?php echo $content->like_count; ?></span>
			        </span>      
			    </a>
			</div>
		</div>
		<div class="post-inner">
			<div class="post-header">
				<h2 class="post-title"><?php echo CHtml::link($content->title, Yii::app()->createUrl($content->slug)); ?></h2>
				
				<div class="clearfix"></div>
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
			<div class="clearfix"></div>
			<div class="post-description">
				<?php
					$md = new CMarkdownParser;
					$dom = new DOMDocument();
					$dom->loadHtml('<?xml encoding="UTF-8">'.$md->safeTransform($content->content));
					$x = new DOMXPath($dom);

					foreach ($x->query('//a') as $node)
					{
						$element = $node->getAttribute('href');

						// Don't follow links outside of this site, and always open them in a new tab
						if ($element[0] !== "/")
						{
							$node->setAttribute('rel', 'nofollow');
							$node->setAttribute('target', '_blank');
						}
					}
				?>

				<div id="md-output"><?php echo $md->safeTransform($dom->saveHtml()); ?></div>
				<textarea id="markdown" style="display:none;"><?php echo $content->content; ?></textarea>
			</div>
		</div>
	    <div style="clear:both;"><br /></div>
	</div>
</div>

<hr />

<div class="comments <?php echo Cii::getConfig('useDisqusComments') ? 'disqus' : NULL; ?>">
	<?php if (Cii::getConfig('useDisqusComments')): ?>
		<?php $shortname = Cii::getConfig('disqus_shortname'); ?>
		<div class="post"><div class="post-inner" style="margin-top: 20px;"><div id="disqus_thread"></div></div></div>
        <?php Yii::app()->getClientScript()->registerScript('disqus-comments', "SpectreTheme.Blog.loadDisqus(\"{$shortname}\", \"{$content->id}\", \"{$content->title}\", \"{$content->slug}\");"); ?>
    <?php else: ?>
		<?php $count = 0;?>
		<?php echo CHtml::link(NULL, NULL, array('name'=>'comments')); ?>
		<div class="post">
			<div class="post-inner">
				<div class="post-header post-header-comments">
					<h3 class="comment-count pull-left left-header"><?php echo Yii::t('SpectreTheme', '{{count}} Comments', array('{{count}}' => $comments)); ?></h3>
				</div>
				<div class="clearfix"></div>
				<?php if (!Yii::app()->user->isGuest): ?>
					<?php if ($data->commentable): ?>
					<a id="comment-box"></a>
				<div id="sharebox" class="comment-box">
				    <div id="a">
					<div id="textbox" contenteditable="true"></div>
					<div id="close"></div>
					<div style="clear:both"></div>
				    </div>
				    <div id="b" style="color:#999"><?php echo Yii::t('SpectreTheme', 'Comment on this post'); ?></div> 
				</div>

				<a id="submit-comment" class="sharebox-submit btn btn-success" style="margin-bottom: 5px;" href="#">
					<i class="icon-spin icon-spinner" style="display:none;"></i>
					<?php echo Yii::t('SpectreTheme', 'Submit'); ?>
				</a>

			<?php endif; ?>
		    <?php else: ?>
					<div class="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo Yii::t('SpectreTheme', '{{heythere}} Before leaving a comment you must {{signup}} or {{register}}', array(
							'{{heythere}}' => CHtml::tag('strong', array(), Yii::t('SpectreTheme', 'Hey there!')),
							'{{signup}}' => CHtml::link(Yii::t('SpectreTheme', 'login'), $this->createUrl('/login?next=' . $content->slug)),
							'{{register}}' => CHtml::link(Yii::t('SpectreTheme', 'signup'), $this->createUrl('/register'))
						)); ?>
					</div>
			<?php endif; ?>
		    <div id="comment-container" style="display:none; margin-top: -1px;"></div>
		    <div class="comment"></div>
		    <div class="clearfix"></div>
		</div>
	</div>
	<?php endif; ?>
</div>

<?php Yii::app()->getClientScript()
                ->registerCssFile($this->asset.'/highlight.js/default.css')
				->registerCssFile($this->asset.'/highlight.js/github.css')
				->registerScriptFile($this->asset.'/js/marked.js')
				->registerScriptFile($this->asset.'/highlight.js/highlight.pack.js')
				->registerScript('loadBlog', '$(document).ready(function() { SpectreTheme.loadBlog(' . $content->id . '); });');
$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => ' .timeago',
));
?>
