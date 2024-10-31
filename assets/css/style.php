<?php
function redhawk_style_on_grid() {
	?>
	<style>
div#group_instafeed {
	width:100%;
}
li#sfc_instafeed_id {
	width:234px;
	height:220px;
	overflow:hidden;
	display:inline-block;
	margin:-2px;
}
li#sfc_instafeed_id img.img-responsive.photo-thumb {
	width:170%;
}
li#sfc_instafeed_id a .sfc_overlay_item:hover:before {
	background: <?php if(get_option('redhawk_set_color')==''){echo "rgba(42, 47, 107, 0.68)";}else{ echo get_option('redhawk_set_color');} ?>;
	content: "<?php if(get_option('redhawk_set_text')==''){echo "See on instagram";}else{ echo get_option('redhawk_set_text');} ?>" !important;
	position:absolute;
	width:234px;
	height:220px;
	transition:0.3s;
	color:<?php if(get_option('redhawk_set_text_color')==''){echo "#fff";}else{ echo get_option('redhawk_set_text_color');} ?>;
	text-align:center;
}
li#sfc_instafeed_id a .sfc_overlay:before {
	content: "";
	position:absolute;
	color:#fff;
}
.sfc_overlay_back:hover:before {
    content: "\f16d";
    position: absolute;
    text-align: center;
    margin-top: 75px;
    color: <?php if(get_option('redhawk_set_icon_color')==''){echo "#fff";}else{ echo get_option('redhawk_set_icon_color');} ?>; ?>;
    width: 234px;
    height: 220px;
    font-size: 39pt;
    font-family: FontAwesome;
}
	</style>
	<?php
}