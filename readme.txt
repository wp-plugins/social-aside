=== Social Aside ===
Contributors: danikaze
Donate link: 
Tags: sidebar, social, twitter, facebook, rss, email, mail, contact
Requires at least: 2.0
Tested up to: 3.2.1
Stable tag: 1.1

Shows links to your twitter, facebook, rss and email.

== Description ==

This plugin provides links/icons for your social-media accounts, like twitter, facebook, your blog rss and a link to your email

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Why? =

Why not?

= I enabled the plugin, but nothing shows =

The plugin generates the code, but it needs you to customize and add you own icon images.
This is an example of css with 27x27px icon images:
`/*
 * ASIDE-SOCIAL PLUGIN
 */

.widget_aside_social {
	display: block;
	width: 188px;
	height: 30px;
	margin: 20px auto 20px auto;
}

.widget_aside_social div:hover {
	margin-top: -3px;
	margin-bottom: 3px;
}

.widget_aside_social div {
	float: left;
	display: block;
	width: 27px;
	height: 27px;
	background: url(img/top-icons.png);
	margin: 0 10px;
}

.widget_aside_social div a {
	display: block;
	width: 27px;
	height: 27px;
}

.widget_aside_social .twitter {
	background-position: -11px -11px !important;
}
.widget_aside_social .facebook {
	background-position: -60px -11px !important;
}
.widget_aside_social .rss {
	background-position: -109px -11px !important;
}
.widget_aside_social .mail {
	background-position: -158px -11px !important;
}`

In future versions I will add a default-css code option so you don't need to touch anything.

== Screenshots ==

1. Icons of twitter, facebook, rss and mail with custom css

== Changelog ==

= 1.1 = 
* Fixed wordpress tagging things (n00b!) :P

= 1.0 = 
* First version wohooi! (so, everything)

== Upgrade Notice ==

= 1.0 =
* Nothing to upgrade, since there's no other version before this ;)
