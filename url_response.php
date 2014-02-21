<?php

    define('APPLICATION_DIR', '');
	define('REQUEST_URI', $_SERVER['REQUEST_URI']);

	function url_response($urlpatterns) {
		$found = false;

		$request_uri_no_param = REQUEST_URI;
	    if (strpos(REQUEST_URI, '?') != 0) {
		    $request_uri_no_param = substr(REQUEST_URI, 0, strpos(REQUEST_URI, '?'));
		}
		
		foreach ($urlpatterns as $friendly => $actual) {
			$friendly = APPLICATION_DIR.$friendly;
		
			if ($request_uri_no_param == $friendly) {
				$found = true;
				include($actual);
                
                return;
			}
		}
		
		if (!$found)
            include("404.php");
		
		return;		
	}

?>
