<?php

/**
 * READER FUNCTIONS
 * 
 * This file allows you to add functions and plain procedures that will be 
 * loaded every time the public reader loads.
 * 
 * If this file doesn't exist, the default theme's reader_functions.php will
 * be loaded.
 *
 * For more information, refer to the support sites linked in your admin panel.
 */





/**
 * Returns the sidebar in the theme
 * 
 * @param string team name
 * @author Woxxy
 * @return string facebook widget for the team
 */
if(!function_exists('get_sidebar'))
{
	function get_sidebar()
	{
		$echo = '';
		$echo .= '<ul class="sidebar_2">';
		if(get_setting_irc()&&get_setting_twitter())$echo .= '<li class="social_module"><h3>'._("Social Integration").'</h3><div class="social_text">'. get_twitter_widget() .'<br />'. get_irc_widget() .'</div></li>';
		$echo .= '<li class="rss_module"><h3>'._("Social Integration").'</h3><div class="social_text">'._("coming soon").'</div></li>';
		if(get_setting_facebook())$echo .= '<li class="facebook_module"><h3>Facebook</h3>'._(" - - - - - -Like us on Facebook:").'<div class="social_text">'. get_facebook_widget() .'</div></li>';
		$echo .= '</ul>';
		return $echo;
	}
}

/**
 * Returns twitter for the team
 * If $team is not set, it returns the home team's twitter
 * 
 * @param string team name
 * @author Woxxy
 * @return string twitter for the team
 */
if(!function_exists('get_setting_twitter'))
{
	function get_setting_twitter($team = NULL)
	{
		if(is_null($team)) return get_home_team()->twitter;
		$team = get_home_team();
		return $team->twitter;
	}
}

/**
 * Returns IRC widget for the team
 * If $team is not set, it returns the home team's twitter widget
 * 
 * @param string team name
 * @author Woxxy
 * @return string twitter for the team
 */
if(!function_exists('get_twitter_widget'))
{
	function get_twitter_widget($team = NULL)
	{
		$twitter = get_setting_twitter($team);
		$echo = "<iframe allowtransparency='true' frameborder='0' scrolling='no' src=//platform.twitter.com/widgets/follow_button.html?screen_name=".urlencode($twitter)."&show_count=false&link_color=ffffff&text_color=ffffff' style='width:300px; height:20px;'></iframe>";
		return $echo;
	}
			
}

/**
 * Returns IRC for the team
 * If $team is not set, it returns the home team's irc
 * 
 * @param string team name
 * @author Woxxy
 * @return string irc for the team
 */
if(!function_exists('get_setting_irc'))
{
	function get_setting_irc($team = NULL)
	{
		if(is_null($team)) return get_home_team()->irc;
		$team = get_home_team();
		return $team->irc;
	}
}

/**
 * Returns IRC widget for the team
 * If $team is not set, it returns the home team's irc widget
 * 
 * @param string team namo
 * @author Woxxy
 * @return string irc widget for the team
 */
if(!function_exists('get_irc_widget'))
{
	function get_irc_widget($team = NULL)
	{
		$irc = get_setting_irc($team);
		
		$echo = _('• Come chat with us on:<br />') . ' <a href="'.parse_irc($irc).'">' . $irc . '</a>';
		return '<div class="text">'.$echo.'</div>';
	}
}

/**
 * Returns facebook url for the team
 * If $team is not set, it returns the home team's facebook
 * 
 * @param string team name
 * @author Woxxy
 * @return string facebook for the team
 */
if(!function_exists('get_setting_facebook'))
{
	function get_setting_facebook($team = NULL)
	{
		$hometeam = get_setting('fs_gen_default_team');
		$team = get_home_team();
		return $team->facebook;
	}
}

/**
 * Returns facebook widget for the team
 * If $team is not set, it returns the home team's facebook widget
 * 
 * @param string team name
 * @author Woxxy
 * @return string facebook widget for the team
 */
if(!function_exists('get_facebook_widget'))
{
	function get_facebook_widget($team = NULL)
	{
		$facebook = get_setting_facebook($team);
		
		$echo = "<div class='fb-like' data-href=".urlencode($facebook)." data-send='false' data-width='280' data-show-faces='false' data-colorscheme='dark'></div>";
		return $echo;
	}
}
