<?php

class Exam extends Controller {

	public function index(){

		$data['title'] = "example title";
		$data['posts'] = $this->model('ExamModel')->getAll();
		$this->view('templates/header', $data);
		$this->view('exam/index', $data);
		$this->view('templates/footer');

	}

	public function show($id = null){
		$data['title'] = "example title";
		$data['post'] = $this->model('ExamModel')->getPosts($id);
		$this->view('templates/header', $data);
		$this->view('exam/show', $data);
		$this->view('templates/footer');
	}
}