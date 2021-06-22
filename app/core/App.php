<?php 


class App {
	Protected $controller = 'home';
	Protected $method = 'index';
	Protected $paramas = [];

	public function __construct(){
		$url = $this->parseUrl();
		if ( isset($url) ) {
			if ( file_exists('../app/controllers/' . $url[0] . '.php') ) {
				$this->controller = $url[0];
				unset($url[0]);
			}

			if ( isset($url[1]) ) {
				if ( method_exists($this->controller, $url[1]) ) {
					$this->method = $url[1];
					unset($url[1]);
				}
			}
		}

		require '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;
		
		if ( !empty($url) ) {
			$this->paramas = array_values($url);
		}

		call_user_func_array([$this->controller, $this->method], $this->paramas);
		
	}

	public function parseUrl(){
		if ( isset($_GET['url']) ) {
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}