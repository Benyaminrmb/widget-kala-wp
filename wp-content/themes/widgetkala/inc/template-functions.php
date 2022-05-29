<?php
if ( ! function_exists('mt_asset') ){
	/**
	 * @param string $file_path
	 * @param bool   $echo
	 *
	 * @return string|null
	 */
	function mt_asset($file_path = '', $echo = true)
	{
		if ( $echo ){
			echo get_theme_file_uri('assets/' . $file_path);
			
			return null;
		}
		
		return get_theme_file_uri('assets/' . $file_path);
	}
}
if ( ! function_exists('mt_word_count') ){
	function mt_word_count($str = '')
	: int
	{
		return count(preg_split('~[^\p{L}\p{N}\']+~u', $str));
	}
}
if ( ! function_exists('mt_reading_time') ){
	function mt_reading_time($id = null)
	: string
	{
		global $post;
		if ( $id ){
			$post = get_post($id);
		}
		$content      = get_post_field('post_content', $post->ID);
		$word_count   = mt_word_count(strip_tags($content));
		$reading_time = ceil($word_count / 160);
		if ( $reading_time > 1 ){
			return sprintf(__('about %d minutes', 'it'), $reading_time);
		}
		
		return sprintf(__('less than one minute', 'it'), $reading_time);
	}
}
if ( ! function_exists('mt_svg_icon') ){
	/**
	 * @param string $icon_name
	 * @param int    $size
	 * @param bool   $echo
	 *
	 * @return string|string[]|null
	 */
	function mt_svg_icon($icon_name = '', $size = 24, $echo = true)
	{
		if ( class_exists('itSvgIcons') ){
			$icon = (new itSvgIcons)->svg_icon($icon_name, $size);
			if ( $echo ){
				echo $icon;
				
				return null;
			}
			
			return $icon;
		}
		
		return null;
	}
}
if ( ! function_exists('mt_share_links') ){
	/**
	 * @param string $link
	 * @param string $text
	 */
	function mt_share_links($link = '', $text = '')
	{
		if ( empty($link) ){
			$link = get_home_url();
		}
		if ( empty($text) ){
			$text = get_option('blogname');
		}
		$title = __('hi I found something amazing. see this page', 'it');
		$icons = [
			'twitter'  => "https://twitter.com/intent/tweet?url={$link}&text={$title}",
			'gmail'    => "https://mail.google.com/mail/?view=cm&su={$title}&body={$link}&to=",
			'telegram' => "https://t.me/share/url?url={$link}&text={$text}",
			'whatsapp' => "https://wa.me/?text={$title} {$link}",
			'facebook' => "https://www.facebook.com/sharer.php?u={$link}",
			'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url={$link}",
			'skype'    => "https://web.skype.com/share?url={$link}&text={$text}",
			'message'  => "mailto:?subject={$title}&body={$link} {$text}",
		];
		if ( wp_is_mobile() ){
			$icons[ 'telegram' ] = "tg://msg_url?url={$link}&text={$text}";
			$icons[ 'whatsapp' ] = "whatsapp://send/?text={$text}%20{$link}";
			//			$icons[ 'sms' ]      = "sms:{phone_number}?body={$link}{$text}";
		}
		$html[]       = '<ul class="unstyled-list social-share-list">';
		$active_icons = [
			'twitter', 'gmail', 'telegram', 'whatsapp', 'facebook', 'linkedind',
		];
		//		$final_icons  = array_merge(
		//			array_diff($icons, $active_icons),
		//			array_diff($active_icons, $icons)
		//		);
		$final_icons = array_intersect($active_icons, array_keys($icons));
		//				echo '<pre>' . json_encode($final_icons, 256 | 64) . '</pre>';
		foreach ( $icons as $icon => $url ) {
			if ( ! in_array($icon, $final_icons) ){
				continue;
			}
			$html[]
				= "<li><a class='{$icon}' target='_blank' href='{$url}'><i class='icon-{$icon}'></i> </a> </li>";
		}
		$html[] = '</ul>';
		
		return implode('', $html);
	}
}
if ( ! function_exists('mt_convert_numbers') ){
	function mt_convert_numbers($string = '', $to = 'en')
	{
		$persianNumbers = [ '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '،' ];
		$englishNumbers = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ',' ];
		if ( $to === 'en' ){
			return str_replace(
				$persianNumbers,
				$englishNumbers,
				$string
			);
		}
		
		return str_replace(
			$englishNumbers,
			$persianNumbers,
			$string
		);
	}
}
if ( ! function_exists('mt_wc_attribute_slug_to_title') ){
	function mt_wc_attribute_slug_to_title($attribute, $slug)
	{
		$value = '';
		global $woocommerce;
		if ( taxonomy_exists(esc_attr(str_replace('attribute_', '', $attribute))) ){
			$term = get_term_by('slug', $slug, esc_attr(str_replace('attribute_', '', $attribute)));
			if ( ! is_wp_error($term) && $term->name ){
				$value = $term->name;
			}
		}
		else {
			$value = apply_filters('woocommerce_variation_option_name', $slug);
		}
		
		return $value;
	}
}
if ( ! function_exists('mt_default_sidebar') ){
	function mt_default_sidebar($sidebar = '', $count = 1, $echo = true)
	{
		switch ( $sidebar ) {
			case 'footer-1' :
			case 'footer-2' :
				$widget_content = <<<WIDGET
<div class="col-6 widget">
	<div class="widget-title">عنوان موضوع اول</div>
	<div class="widget-content">
		<ul>
			<li>
				<a href="#">عنوان لینک اول</a>
			</li>
			<li>
				<a href="#">عنوان لینک اول</a>
			</li>
			<li>
				<a href="#">عنوان لینک اول</a>
			</li>
			<li>
				<a href="#">عنوان لینک اول</a>
			</li>
			<li>
				<a href="#">عنوان لینک اول</a>
			</li>
			<li>
				<a href="#">عنوان لینک اول</a>
			</li>
			<li>
				<a href="#">عنوان لینک اول</a>
			</li>
		</ul>
	</div>
</div>
WIDGET;
				break;
			case 'footer-center' :
				$widget_content = <<<WIDGET
<div class="widget">
	<div class="widget-content">
	عنوان موضوع اولعنوان موضوع اولعنوان موضوع
    اولعنوان موضوع اولعنوان موضوع اولعنوان موضوع
    اولعنوان موضوع اولعنوان موضوع اولعنوان موضوع
    اولعنوان موضوع اولعنوان موضوع اولعنوان موضوع
    اولعنوان موضوع اولعنوان موضوع اولعنوان موضوع اول
	</div>
</div>
WIDGET;
				break;
			default :
				$widget_content = '';
				break;
		}
		$html = '';
		for ( $c = 0; $c = $count; $c++ ) {
			$html .= $widget_content;
		}
		if ( $echo ){
			echo $html;
			
			return null;
		}
		
		return $html;
	}
}
