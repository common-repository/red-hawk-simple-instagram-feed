<?php
if (!defined('ABSPATH')) exit;
function rhsif_simple_instagram_feed_grids($rhsif_entiven_link,$rhsif_entiven_text,$rhsif_entiven_likes,$rhsif_entiven_comments,$rhsif_entiven_image,$rhsif_entiven_time) 
{ 
?>	
					<li id="rdh_sif_instafeed_id" class="rdh_sif_instafeed rhsif_grids">
						<a href="<?= $rhsif_entiven_link; ?>">
							<div class="rdh_sif_image-section_item">
									<img class="img-responsive photo-thumb" src="<?php echo $rhsif_entiven_image; ?>" data-balloon="<?php _e('View on instagram','rhsif_entiven_lang'); ?> " data-balloon-pos="right">
							</div>
							<div class="rhsif_text-section">
							<div class="rhsif_meta_info">
								<span class="rhsif_insta_likes"><i class="mdi mdi-heart"></i> <?= $rhsif_entiven_likes ?></span>
								<span class="rhsif_insta_comme">
									<i class="mdi mdi-comment-multiple-outline"></i> <?=$rhsif_entiven_comments ?>
								</span>
								<small><?= $rhsif_entiven_time ?></small>
							</div>
							<p class="rhsif_caption">
								<?php
									echo substr($rhsif_entiven_text, 0, 50);
								?>
							</p>
							</div>		
						</a>
					</li>		
<?php
}
?>