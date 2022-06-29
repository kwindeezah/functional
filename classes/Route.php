<?php

class FormController extends UserAuth{

    public $fullname;
    public $email;
    public $password;
    public $comfirmPassword;
    public $country;
    public $gender;

    public function handleForm(){
        
        switch(true) {

            case isset($_POST['register']):

                $this->fullname = $_POST['fullnames'];
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $this->confirmPassword = $_POST['comfirmPassword'];
                $this->gender = $_POST['gender'];
                $this->country = $_POST['country'];
                $this->register($this->fullname, $this->email, $this->password, $this->confirmPassword, $this->country, $this->gender);
            break;

            case isset($_POST['login']):

                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $this->login($this->email, $this->password);
            break;

            case isset($_POST['logout']):

                $this->logout();
            break;

            case isset($_POST['delete']):

                $this->id = $_POST['id'];
                $this->deleteUser($this->id);
            break;

            case isset($_POST['reset']):

                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $this->updateUser($this->email, $this->password);
            break;

            case isset($_POST['all']):
            case isset($_GET['all']):

                $this->getAllUsers();
            break;
            default:
                echo 'No form was submitted';
                break;
        }
    }
}
