<?php

class Register extends Controller {
  public function index() {
    $data['title'] = 'home';
    // $data["nama"] = $this->model('User_model')->getUser();
    // $this->view('template/header', $data);
    $this->view("auth/register", $data);
    // $this->view('template/footer', $data);
  }
}