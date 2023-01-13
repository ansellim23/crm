<?php
/**
 * Twitter API
 *
 * @package ThemeREX Addons
 * @since v1.0
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	exit;
}


//----------------------------------------------------------------------
//--  New API (use a single bearer token for access)
//----------------------------------------------------------------------

// Acquire data from Twitter with a new API (use a single bearer token for access)
if ( ! function_exists( 'trx_addons_get_twitter_data_v2' ) ) {
	function trx_addons_get_twitter_data_v2( $cfg ) {
		$data = false;
		if ( ! empty( $cfg['username'] ) ) {
			if ( empty( $cfg['mode'] ) ) {
				$cfg['mode'] = 'user_timeline';
			}
			$data = get_transient( "trx_addons_twitter_data_" . trim( $cfg['mode'] ) . '_' . trim( $cfg['username'] ) );
			if ( ! $data ) {
				$user_id = '';
				$resp = trx_addons_remote_get( "https://api.twitter.com/2/users/by/username/{$cfg['username']}",
												array(
													'headers' => array(
														'Authorization' => 'Bearer ' . $cfg['bearer']
													)
												)
											);
				if ( ! empty( $resp ) ) {
					$resp = json_decode( $resp, true );
					if ( ! empty( $resp['data']['id'] ) ) {
						$user_id = $resp['data']['id'];
					}
				}
				if ( ! empty( $user_id ) ) {
					$resp = trx_addons_remote_get( "https://api.twitter.com/2/users/{$user_id}/tweets?max_results={$cfg['count']}",
													array(
														'headers' => array(
															'Authorization' => 'Bearer ' . $cfg['bearer']
														)
													)
												);
					if ( ! empty( $resp ) ) {
						$resp = json_decode( $resp, true );
						if ( ! empty( $resp['data'] ) && is_array( $resp['data'] ) && ! empty( $resp['data'][0]['id'] ) ) {
							$data = $resp['data'];
							set_transient( "trx_addons_twitter_data_" . trim( $cfg['mode'] ) . '_' . trim( $cfg['username'] ), $data, 60*60 );
						}
					}
				}
			} else if ( ! is_array( $data ) && is_serialized( $data ) ) {
				$data = unserialize( $data );
			}
		}
		return $data;
	}
}





//----------------------------------------------------------------------
//--  Old API (use 4 params for access)
//----------------------------------------------------------------------

// Acquire data from Twitter with an old API (use 4 params for access)
if (!function_exists('trx_addons_get_twitter_data')) {
	function trx_addons_get_twitter_data($cfg) {
		if (empty($cfg['mode'])) $cfg['mode'] = 'user_timeline';
		$data = get_transient("trx_addons_twitter_data_".trim($cfg['mode']).'_'.trim($cfg['token']));
		if ( ! $data ) {
			require_once TRX_ADDONS_PLUGIN_DIR . TRX_ADDONS_PLUGIN_API . 'twitter/tmhOAuth/tmhOAuth.php';
			$tmhOAuth = new tmhOAuth(array(
				'consumer_key'    => $cfg['consumer_key'],
				'consumer_secret' => $cfg['consumer_secret'],
				'token'           => $cfg['token'],
				'secret'          => $cfg['secret']
			));
			$code = $tmhOAuth->user_request(array(
				'url' => $tmhOAuth->url(trx_addons_get_twitter_mode_url($cfg['mode']))
			));
			if ($code == 200) {
				$data = json_decode($tmhOAuth->response['response'], true);
				if (isset($data['status'])) {
					$code = $tmhOAuth->user_request(array(
						'url' => $tmhOAuth->url(trx_addons_get_twitter_mode_url($cfg['oembed'])),
						'params' => array(
							'id' => $data['status']['id_str']
						)
					));
					if ($code == 200)
						$data = json_decode($tmhOAuth->response['response'], true);
				}
				set_transient("trx_addons_twitter_data_".($cfg['mode']), $data, 60*60);
			}
		} else if (!is_array($data) && is_serialized($data)) {
			$data = unserialize($data);
		}
		return $data;
	}
}

// Return URL for the specified mode
if (!function_exists('trx_addons_get_twitter_mode_url')) {
	function trx_addons_get_twitter_mode_url($mode) {
		$url = '/1.1/statuses/';
		if ($mode == 'user_timeline')
			$url .= $mode;
		else if ($mode == 'home_timeline')
			$url .= $mode;
		return $url;
	}
}
	
// Prepare Twitter feed to output
if (!function_exists('trx_addons_prepare_twitter_text')) {
	function trx_addons_prepare_twitter_text($tweet) {
		$text = $tweet['text'];
		if ( ! empty($tweet['entities']['urls']) || ! empty($tweet['entities']['media']) ) {
			if ( ! empty($tweet['entities']['urls']) && count($tweet['entities']['urls']) > 0) {
				foreach ($tweet['entities']['urls'] as $url) {
					$text = str_replace($url['url'], '<a href="'.esc_url($url['expanded_url']).'" target="_blank">' . ($url['display_url']) . '</a>', $text);
				}
			}
			if ( ! empty($tweet['entities']['media']) && count($tweet['entities']['media']) > 0) {
				foreach ($tweet['entities']['media'] as $url) {
					$text = str_replace($url['url'], '<a href="'.esc_url($url['expanded_url']).'" target="_blank">' . ($url['display_url']) . '</a>', $text);
				}
			}
		} else {
			$text = preg_replace( '/@([^\s]*)/', '<a href="https://twitter.com/$1" target="_blank">@$1</a>', $text );
		}
		return $text;
	}
}


// Return Twitter followers count
if (!function_exists('trx_addons_get_twitter_followers')) {
	function trx_addons_get_twitter_followers($cfg) {
		$data = trx_addons_get_twitter_data($cfg); 
		return $data && isset($data[0]['user']['followers_count']) ? $data[0]['user']['followers_count'] : 0;
	}
}
