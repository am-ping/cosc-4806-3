<?php

class Create extends Controller {

  public function index() {		
    $this->view('create/index');
  }

  public function verify(){
    
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $confirm_pwd = $_REQUEST['confirm_pwd'];
    
    $user = $this->model('User');
    $account = $user->validate( $username );
    
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{10,}$/';
    
    if ($password != $confirm_pwd) {
      $_SESSION["pwds_unmatch"] = "Passwords do not match";
      header('Location: /create');
    } else if (!preg_match($pattern, $password)) {
      $_SESSION["pwd_strength"] = "Password should contain at least 10 characters, 1 uppercase, 1 number and 1 special character (!@#$%^&*-)";
      header('Location: /create');
    } else if ($account && count($account)) {
      $_SESSION["failed_signup"] = "Username already exists";
      header('Location: /create');
    } else {
      $user->create_user( $username, $password );
      $_SESSION["acct_created"] = "Account created successfully";
      header('Location: /create');
    }
    
  }
  
}