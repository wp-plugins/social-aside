<?php
/*
Plugin Name: Social Aside
Plugin URI: http://wordpress.org/extend/plugins/social-aside/
Description: Shows twitter, facebook and RSS buttons in the sidebar.
Version: 1.1
Author: Daniel Berlanga
Author URI: http://blog.danielberlanga.es
*/
/*  
	License: GPL2
	Copyright 2011  Daniel Berlanga  (email : dani@danielberlanga.es)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * SocialAside_Widget Class
 */
class SocialAside_Widget extends WP_Widget {
	/** constructor */
	function __construct() {
		parent::WP_Widget( /* Base ID */'SocialAside_Widget', /* Name */'Social Aside', array( 'description' => 'Add Twitter, Facebook, RSS and mail buttons to your sidebar' ) );
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
//		$title = apply_filters( 'widget_title', $instance['title'] );
		//echo $before_widget;
//		if ( $title )
//			echo $before_title . $title . $after_title; 
?>
		<div class="widget_aside_social"> <!-- html5: aside -->
		<?php 
		if($instance['twitter_on']) { 
		?>
			<div class="twitter"><a href="<?php echo $instance['twitter']; ?>"></a></div>
		<?php
		}
		if($instance['facebook_on']) { 
		?>
			<div class="facebook"><a href="<?php echo $instance['facebook']; ?>"></a></div>
		<?php
		} 
		if($instance['rss_on']) {
		?>
			<div class="rss"><a href="<?php echo $instance['rss']; ?>"></a></div>
		<?php
		}
		if($instance['mail_on']) 
		{
		?>
			<div class="mail"><a href="<?php echo $instance['mail']; ?>"></a></div>
		<?php
		}
		?>
		</div> <!-- html5: /aside -->
<?php 
		//echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['twitter_on'] = isset($new_instance['twitter_on']);
		$instance['facebook_on'] = isset($new_instance['facebook_on']);
		$instance['rss_on'] = isset($new_instance['rss_on']);
		$instance['mail_on'] = isset($new_instance['mail_on']);
		
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		if($new_instance['rss']) {
			$instance['rss'] = strip_tags($new_instance['rss']);
		} else {
			$instance['rss'] = get_bloginfo('rss2_url');
		}
		$instance['mail'] = strip_tags($new_instance['mail']);
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$twitter = esc_attr( $instance[ 'twitter' ] );
			$facebook = esc_attr( $instance[ 'facebook' ] );
			$rss = esc_attr( $instance[ 'rss' ] );
			$mail = esc_attr( $instance[ 'mail' ] );
			$twitter_on = $instance['twitter_on'];
			$facebook_on = $instance['facebook_on'];
			$rss_on = $instance['rss_on'];
			$mail_on = $instance['mail_on'];
		}
		else {
			$twitter = '';
			$facebook = '';
			$rss = '';
			$mail = '';
			$twitter_on = false;
			$facebook_on = false;
			$rss_on = false;
			$mail_on = false;
		}
		?>
		<p>
		
		<input type="checkbox" name="<?php echo $this->get_field_name('twitter_on'); ?>" <?php if($twitter_on) echo 'checked="checked"'; ?>>
		<label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
		</p>
		<p>
		<input type="checkbox" name="<?php echo $this->get_field_name('facebook_on'); ?>" <?php if($facebook_on) echo 'checked="checked"'; ?>>
		<label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
		</p>
		<p>
		<input type="checkbox" name="<?php echo $this->get_field_name('rss_on'); ?>" <?php if($rss_on) echo 'checked="checked"'; ?>>
		<label for="<?php echo $this->get_field_id('rss'); ?>">RSS:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" />
		</p>
		<p>
		<input type="checkbox" name="<?php echo $this->get_field_name('mail_on'); ?>" <?php if($mail_on) echo 'checked="checked"'; ?>>
		<label for="<?php echo $this->get_field_id('mail'); ?>">Email:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id('mail'); ?>" name="<?php echo $this->get_field_name('mail'); ?>" type="text" value="<?php echo $mail; ?>" />
		</p>
		<?php 
	}

} // class SocialAside_Widget

// register SocialAside_Widget widget
add_action('widgets_init',function(){
     return register_widget('SocialAside_Widget');
});
?>
