<?php

class Home extends Controller {
  public function index() {
    $data['title'] = 'home';
    $data["nama"] = $this->model('User_model')->getUser();
    $this->view('template/header', $data);
    $this->view("home/index", $data);
    $this->view('template/footer', $data);
  }

  public function about($company = 'SMKN1')
  {
    $data["title"] = "About";
    $data["company"] = $company;
    $this->view("template/header");
  }

  public function register()
  {
    if (isset($_POST['username'])) {
      $data = [
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
      ];

      $this->model('user_model')->addUser($data);
    }

    $this->view("auth/register", []);

  }
}