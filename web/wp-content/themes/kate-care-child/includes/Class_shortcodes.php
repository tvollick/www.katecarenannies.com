<?php

class KC_Shortcodes { 

	public function __construct () {
		$this->map_shortcodes(); 
		add_action('init', array($this, 'register_shortcodes')); 
	}


	public function register_shortcodes () { 
		add_shortcode('kc_button', array($this, 'kc_button_func'));
		add_shortcode('kc_button_group', array($this, 'kc_button_group_func'));  
		add_shortcode('kc_img_grid', array($this, 'kc_img_grid_func')); 
	}

	public function map_shortcodes () {
		vc_map(array(
			'name' => __('Image Grid'),
			'base' => 'kc_img_grid',
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => __('Top Right Image'),  
					'param_name' => 'img_1'
				), 
				array(
					'type' => 'attach_image',
					'heading' => __('Bottom Left Image'),  
					'param_name' => 'img_2'
				), 
				array(
					'type' => 'attach_image',
					'heading' => __('Background Image'),  
					'param_name' => 'bg'
				)
			)
		)); 


		vc_map(array(
			'name' => __('Kate Care Button'), 
			'base' => 'kc_button',
			'params' => array(
				array(
					'type' => 'dropdown', 
					'heading' => __('Button Color'),
					'param_name' => 'color', 
					'value' => array('grey', 'dark-blue', 'light-blue', 'salmon'),
					'admin_label' => true
				), 
				array(
					'type' => 'textfield', 
					'heading' => __('Button Text'), 
					'param_name' => 'label',
					'value' => 'Learn More',
					'admin_label' => true
				), 
				array(
					'type' => 'vc_link', 
					'heading' => __('URL'),
					'param_name' => 'link',
					'value' => '',
					'admin_label' => true
				)
			)
		)); 

		vc_map(array(
			'name' => __('Kate Care Button Group'),
			'base' => 'kc_button_group', 
			'icon' => 'icon-wpb-row',
			'as_parent' => array('only' => 'kc_button'),
			'content_element' => true,
			'show_settings_on_create' => true,		
			'js_view' => 'VcColumnView',	
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => __('Align'), 
					'param_name' => 'align',
					'value' => array('center','left','right'),
					'admin_label' => true
				)
			)
		)); 
	}

	public function kc_button_func ($atts, $content = null) { 
		$atts = extract(shortcode_atts(
			array(
				'color' => 'grey', 
				'link' => '',
				'label' => 'Learn More'
			)
		, $atts)); 

		$the_link = vc_build_link($link); 

		if ( ! empty($the_link['url'])) {  

			$new_target = $the_link['target']; 
			if ( ! empty( $new_target )) { 
				$the_target = $new_target; 
			} else { 
				$the_target = '_self'; 
			}

			$l = ''; 
			$l.= '<a href="'.$the_link['url'].'" class="btn btn-'.$color.'">'.$label.'</a>'; 
			return $l; 

		} else {
			return;
		}

	}

	public function kc_button_group_func ($atts, $content = null) { 
		$atts = extract(shortcode_atts(
			array(
				'align' => 'center'
			),
			$atts
		)); 

		$l = '';

		$l.='<div class="kc-button-group kc-button-group_'.$align.'">'; 
		$l.= do_shortcode($content); 
		$l.='</div>'; //.kc-button-group

		return $l; 
	}

	public function kc_img_grid_func ($atts, $content = null) { 

		$atts = extract(shortcode_atts(
			array(
				'img_1' => '',
				'img_2' => '',
				'bg' => ''
			), 
			$atts
		)); 

		$l = ''; 
		$l.= '<div class="kc-img-grid">'; 
		$l.= '	<div class="img-grid-bg" style="background-image: url('.$this->get_img_url($bg).');"></div>'; 
		$l.= '	<div class="img-grid-square img-grid-square_tr" style="background-image: url('.$this->get_img_url($img_1).')"></div>'; 
		$l.= '	<div class="img-grid-square img-grid-square_bl" style="background-image: url('.$this->get_img_url($img_2).')"></div>'; 
		$l.= '</div>'; //.kc-img-grid 

		return $l; 

	}

	public function get_img_url ($id, $size = 'full') { 

		if ( ! empty($id)) {
			$src = wp_get_attachment_image_src($id, $size); 
			return $src[0];
		} else { 
			return; 
		}


	}
}

if (class_exists('WPBakeryShortCode')) { 
	class WPBakeryShortCode_Kc_Button extends WPBakeryShortCode {}
}
if (class_exists('WPBakeryShortCodesContainer')) {
	class WPBakeryShortCode_Kc_Button_Group extends WPBakeryShortCodesContainer {}
}


?>