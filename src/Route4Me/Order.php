<?php
	namespace Route4Me;
	
	use Route4Me\Common;
	
	class Order extends Common
	{
		static public $apiUrl = '/api.v4/order.php';
		static public $apiUrlRoute = '/api.v4/route.php';
		static public $apiUrlOpt = '/api.v4/optimization_problem.php';
		
		public $address_1;
        public $address_2;
		public $cached_lat;
		public $cached_lng;
        public $curbside_lat;
        public $curbside_lng;
		public $address_alias;
		public $address_city;
		public $EXT_FIELD_first_name;
		public $EXT_FIELD_last_name;
		public $EXT_FIELD_email;
		public $EXT_FIELD_phone;
		public $EXT_FIELD_custom_data;
        
        public $color;
        public $order_icon;
        public $local_time_window_start;
        public $local_time_window_end;
        public $local_time_window_start_2;
        public $local_time_window_end_2;
        public $service_time;
        
        public $day_scheduled_for_YYMMDD;
		
		public $route_id;
		public $redirect;
		public $optimization_problem_id;
		public $order_id;
		public $order_ids;
		
		public $day_added_YYMMDD;
		public $scheduled_for_YYMMDD;
		public $fields;
		public $offset;
		public $limit;
		public $query;
		
		public function __construct () {  }
		
		public static function fromArray(array $params) {
			$order= new Order();
	        foreach($params as $key => $value) {
	            if (property_exists($order, $key)) {
	                $order->{$key} = $value;
	            }
			}
			
			return $order;
		}
		
		public static function addOrder($params)
	    {
	    	$response = Route4Me::makeRequst(array(
	            'url'    => self::$apiUrl,
	            'method' => 'POST',
	            'body'  => array(
					'address_1' => 	isset($params->address_1) ? $params->address_1: null,
					'address_2' =>     isset($params->address_2) ? $params->address_2: null,
	                'cached_lat' => isset($params->cached_lat) ? $params->cached_lat : null,
	                'cached_lng' => isset($params->cached_lng) ? $params->cached_lng : null,
	                'curbside_lat' => isset($params->curbside_lat) ? $params->curbside_lat : null,
                    'curbside_lng' => isset($params->curbside_lng) ? $params->curbside_lng : null,
	                'color' => isset($params->color) ? $params->color : null,
	                'order_icon' => isset($params->order_icon) ? $params->order_icon : null,
	                'day_scheduled_for_YYMMDD' => isset($params->day_scheduled_for_YYMMDD) ? $params->day_scheduled_for_YYMMDD : null,
	                'address_alias' => isset($params->address_alias) ? $params->address_alias : null,
	                'address_city' => 	isset($params->address_city) ? $params->address_city: null,
	                'local_time_window_start' =>  isset($params->local_time_window_start) ? $params->local_time_window_start: null,
	                'local_time_window_end' =>  isset($params->local_time_window_end) ? $params->local_time_window_end: null,
	                'local_time_window_start_2' =>  isset($params->local_time_window_start_2) ? $params->local_time_window_start_2: null,
	                'local_time_window_end_2' =>  isset($params->local_time_window_end_2) ? $params->local_time_window_end_2: null,
	                'service_time' =>  isset($params->service_time) ? $params->service_time: null,
	                'EXT_FIELD_first_name' => 	isset($params->EXT_FIELD_first_name) ? $params->EXT_FIELD_first_name: null,
	                'EXT_FIELD_last_name' => 	isset($params->EXT_FIELD_last_name) ? $params->EXT_FIELD_last_name: null,
	                'EXT_FIELD_email' => 	isset($params->EXT_FIELD_email) ? $params->EXT_FIELD_email: null,
	                'EXT_FIELD_phone' => 	isset($params->EXT_FIELD_phone) ? $params->EXT_FIELD_phone: null,
	                'EXT_FIELD_custom_data' => 	isset($params->EXT_FIELD_custom_data) ? $params->EXT_FIELD_custom_data: null,
				)
	        ));

			return $response;
		}

		public static function addOrder2Route($params,$body)
	    {
	    	$response = Route4Me::makeRequst(array(
	            'url'    => self::$apiUrlRoute,
	            'method' => 'PUT',
	            'query'  => array(
					'route_id' => 	isset($params->route_id) ? $params->route_id: null,
	                'redirect' => isset($params->redirect) ? $params->redirect : null
				),
				'body'  => (array)$body
			));

			return $response;
		}
		
		public static function addOrder2Destination($params,$body)
	    {
	    	$response = Route4Me::makeRequst(array(
	            'url'    => self::$apiUrlOpt,
	            'method' => 'PUT',
	            'query'  => array(
					'optimization_problem_id' => 	isset($params->optimization_problem_id) ? $params->optimization_problem_id: null,
	                'redirect' => isset($params->redirect) ? $params->redirect : null
				),
				'body'  => (array)$body
			));

			return $response;
		}
		
		public static function getOrder($params)
	    {
	    	$response = Route4Me::makeRequst(array(
	            'url'    => self::$apiUrl,
	            'method' => 'GET',
	            'query'  => array(
					'order_id' => 	isset($params->order_id) ? $params->order_id: null,
				)
	        ));

			return $response;
		}
		
		public static function getOrders()
	    {
	    	$response = Route4Me::makeRequst(array(
	            'url'    => self::$apiUrl,
	            'method' => 'GET'
	        ));

			return $response;
		}
		
		public static function removeOrder($params)
	    {
	    	$response = Route4Me::makeRequst(array(
	            'url'    => self::$apiUrl,
	            'method' => 'DELETE',
	            'body'  => array(
					'order_ids' => 	isset($params->order_ids) ? $params->order_ids: null
				)
	        ));

			return $response;
		}
		
		public static function updateOrder($body)
	    {
	    	$response = Route4Me::makeRequst(array(
	            'url'    => self::$apiUrl,
	            'method' => 'PUT',
	            'body'  => (array)$body
	        ));

			return $response;
		}
		
		public static function searchOrder($params)
	    {
	    	$response = Route4Me::makeRequst(array(
	            'url'    => self::$apiUrl,
	            'method' => 'GET',
	            'query'  => array(
					'day_added_YYMMDD' => 	isset($params->day_added_YYMMDD) ? $params->day_added_YYMMDD: null,
					'scheduled_for_YYMMDD' => 	isset($params->scheduled_for_YYMMDD) ? $params->scheduled_for_YYMMDD: null,
					'fields' => 	isset($params->fields) ? $params->fields: null,
					'offset' => 	isset($params->offset) ? $params->offset: null,
					'limit' => 	isset($params->limit) ? $params->limit: null,
					'query' => 	isset($params->query) ? $params->query: null,
				)
	        ));

			return $response;
		}
        
        public static function validateLatitude($lat)
        {
            if (!is_numeric($lat)) return false;
            
            if ($lat>90 || $lat<-90) return false;
            
            return true;
        }
        
        public static function validateLongitude($lng)
        {
            if (!is_numeric($lng)) return false;
            
            if ($lng>180 || $lng<-180) return false;
            
            return true;
        }
        
        public function addOrdersFromCsvFile($csvFileHandle, $ordersFieldsMapping)
        {
            $max_line_length = 512;
            $delemietr=',';
            
            $results=array();
            $results['fail']=array();
            $results['success']=array();
            
            $columns = fgetcsv($csvFileHandle, $max_line_length, $delemietr);
            
            if (!empty($columns)) {
                 array_push($results['fail'],'Empty CSV table');
                 return ($results);
            }
                     
            $iRow=1;
            
            while (($rows = fgetcsv($csvFileHandle, $max_line_length, $delemietr)) !== false) {
                if ($rows[$ordersFieldsMapping['cached_lat']] && $rows[$ordersFieldsMapping['cached_lng']] && $rows[$ordersFieldsMapping['address_1']] && array(null) !== $rows) {
                    
                    $cached_lat=0.000;
                    
                    if (!$this->validateLatitude($rows[$ordersFieldsMapping['cached_lat']])) {
                        array_push($results['fail'],"$iRow --> Wrong cached_lat"); 
                        $iRow++;
                        continue;
                    }
                    else $cached_lat=doubleval($rows[$ordersFieldsMapping['cached_lat']]);
                    
                    $cached_lng=0.000;
                    
                    if (!$this->validateLongitude($rows[$ordersFieldsMapping['cached_lng']])) {
                        array_push($results['fail'],"$iRow --> Wrong cached_lng"); 
                        $iRow++;
                        continue;
                    }
                    else $cached_lng=doubleval($rows[$ordersFieldsMapping['cached_lng']]);
                    
                    if (isset($ordersFieldsMapping['curbside_lat'])) {
                        if (!$this->validateLatitude($rows[$ordersFieldsMapping['curbside_lat']])) {
                            array_push($results['fail'],"$iRow --> Wrong curbside_lat"); 
                            $iRow++;
                            continue;
                        }
                    }
                    
                    if (isset($ordersFieldsMapping['curbside_lng'])) {
                        if (!$this->validateLongitude($rows[$ordersFieldsMapping['curbside_lng']])) {
                            array_push($results['fail'],"$iRow --> Wrong curbside_lng"); 
                            $iRow++;
                            continue;
                        }
                    }
                    
                    $address=$rows[$ordersFieldsMapping['address_1']];
                    
                    if (isset($ordersFieldsMapping['order_city'])) $address.=', '.$rows[$ordersFieldsMapping['order_city']];
                    if (isset($ordersFieldsMapping['order_state_id'])) $address.=', '.$rows[$ordersFieldsMapping['order_state_id']];
                    if (isset($ordersFieldsMapping['order_zip_code'])) $address.=', '.$rows[$ordersFieldsMapping['order_zip_code']];
                    if (isset($ordersFieldsMapping['order_country_id'])) $address.=', '.$rows[$ordersFieldsMapping['order_country_id']];
                    
                    echo "$iRow --> ".$ordersFieldsMapping['day_scheduled_for_YYMMDD'].", ".$rows[$ordersFieldsMapping['day_scheduled_for_YYMMDD']]."<br>";
                    
                    $orderParameters = Order::fromArray(array(
                        "cached_lat"    => $cached_lat,
                        "cached_lng"    => $cached_lng,
                        "curbside_lat"     => isset($ordersFieldsMapping['curbside_lat']) ? $rows[$ordersFieldsMapping['curbside_lat']] : null,
                        "curbside_lng"     => isset($ordersFieldsMapping['curbside_lng']) ? $rows[$ordersFieldsMapping['curbside_lng']] : null,
                        "color"     => isset($ordersFieldsMapping['color']) ? $rows[$ordersFieldsMapping['color']] : null,
                        "day_scheduled_for_YYMMDD"     => isset($ordersFieldsMapping['day_scheduled_for_YYMMDD']) ? $rows[$ordersFieldsMapping['day_scheduled_for_YYMMDD']] : null,
                        "address_alias"     => isset($ordersFieldsMapping['address_alias']) ? $rows[$ordersFieldsMapping['address_alias']] : null,
                        "address_1"     => $address,
                        "address_2"     => isset($ordersFieldsMapping['address_2']) ? $rows[$ordersFieldsMapping['address_2']] : null,
                        "local_time_window_start"     => isset($ordersFieldsMapping['local_time_window_start']) ? $rows[$ordersFieldsMapping['local_time_window_start']] : null,
                        "local_time_window_end"     => isset($ordersFieldsMapping['local_time_window_end']) ? $rows[$ordersFieldsMapping['local_time_window_end']] : null,
                        "local_time_window_start_2"     => isset($ordersFieldsMapping['local_time_window_start_2']) ? $rows[$ordersFieldsMapping['local_time_window_start_2']] : null,
                        "local_time_window_end_2"     => isset($ordersFieldsMapping['local_time_window_end_2']) ? $rows[$ordersFieldsMapping['local_time_window_end_2']] : null,
                        "service_time"     => isset($ordersFieldsMapping['service_time']) ? $rows[$ordersFieldsMapping['service_time']] : null,
                        "EXT_FIELD_first_name"     => isset($ordersFieldsMapping['EXT_FIELD_first_name']) ? $rows[$ordersFieldsMapping['EXT_FIELD_first_name']] : null,
                        "EXT_FIELD_last_name"     => isset($ordersFieldsMapping['EXT_FIELD_last_name']) ? $rows[$ordersFieldsMapping['EXT_FIELD_last_name']] : null,
                        "EXT_FIELD_email"     => isset($ordersFieldsMapping['EXT_FIELD_email']) ? $rows[$ordersFieldsMapping['EXT_FIELD_email']] : null,
                        "EXT_FIELD_phone"     => isset($ordersFieldsMapping['EXT_FIELD_phone']) ? $rows[$ordersFieldsMapping['EXT_FIELD_phone']] : null,
                        "EXT_FIELD_custom_data"     => isset($ordersFieldsMapping['EXT_FIELD_custom_data']) ? $rows[$ordersFieldsMapping['EXT_FIELD_custom_data']] : null,
                        "order_icon"     => isset($ordersFieldsMapping['order_icon']) ? $rows[$ordersFieldsMapping['order_icon']] : null,
                    ));
                    
                    $order = new Order();
                    
                    $orderResults = $order->addOrder($orderParameters);
                    
                    array_push($results['success'],"The order with order_id = ".strval($orderResults["order_id"])." added successfuly.");
                }
                else {
                    array_push($results['fail'],"$iRow --> one of the parameters cached_lat, cached_lng, address_1 is not set"); 
                }
                
                $iRow++;
            }
        }

	}
	
