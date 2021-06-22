<?php 


class Home extends Controller {

	public function index(){

		$data['title'] = "BaharTitikKom;";
		$this->view('templates/header', $data);
		$this->view('welcome', $data);
		$this->view('templates/footer');

	}
}