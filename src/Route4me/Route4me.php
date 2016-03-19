<?php

namespace Route4me;

use Route4me\Exception\ApiError;

class Route4me
{
    static public $apiKey;
    static public $baseUrl = 'http://route4me.com';

    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    public static function getApiKey()
    {
        return self::$apiKey;
    }

    public static function setBaseUrl($baseUrl)
    {
        self::$baseUrl = $baseUrl;
    }

    public static function getBaseUrl()
    {
        return self::$baseUrl;
    }

    public static function makeRequst($options) {
        $method = isset($options['method']) ? $options['method'] : 'GET';
        $query = isset($options['query']) ?
            array_filter($options['query']) : array();
        $body = isset($options['body']) ?
            array_filter($options['body']) : null;
        $ch = curl_init();
        $url = $options['url'] . '?' . http_build_query(array_merge(
            $query, array( 'api_key' => self::getApiKey())
        ));

        $curlOpts = arraY(
            CURLOPT_URL            => self::getBaseUrl() . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER     => array(
                'User-Agent' => 'Route4me php-sdk'
            )
        );

        curl_setopt_array($ch, $curlOpts);
        switch($method) {
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
            break;
		case 'DELETEARRAY':
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));
            break;
        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			//curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body)); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));
			break;
        case 'POST':
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body)); break;
		case 'ADD':
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query)); break;
        }

        $result = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $json = json_decode($result, true);
		//echo "code --> $code <br>";
		//var_dump($result);
		//die("Stop");
        if (200 == $code) {
            return $json;
        } elseif (isset($json['errors'])) {
            throw new ApiError(implode(', ', $json['errors']));
        } else {
            throw new ApiError('Something wrong');
        }
    }
	
	/**
	 * Prints on the screen main keys and values of the array 
	 *
	 */
	public static function simplePrint($results)
	{
		if (isset($results)) {
			if (is_array($results)) {
				foreach ($results as $key=>$result) {
					if (is_array($result)) {
						foreach ($result as $key1=>$result1) {
							if (is_array($result1)) {
								echo $key1." --> "."Array()";
							} else {
								echo $key1." --> ".$result1."<br>";	
							}
						}
					} else {
						echo $key." --> ".$result."<br>";
					}
					echo "<br>";
				}
			} 
		}
	}

}
