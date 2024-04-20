<?php
class UserController {
private $userModel;

public function __construct() {
require_once '../app/models/UserModel.php';
require_once '../public/index.php';
$this->userModel = new UserModel();
}
public function showMessageCard($message, $duration) {
$html = "<div class='message-card' style='position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); padding: 10px 20px; background-color: rgba(0, 0, 0, 0.7); color: #fff; border-radius: 5px; z-index: 9999;'>$message</div>";
echo $html;
echo "<script>
setTimeout(function() {
document.querySelector('.message-card').style.display = 'none';
}, $duration);
</script>";
}
public function index() {        
// Pass data to the view
require_once '../app/views/user/index/index.php';
}

public function insert() {        
require_once '../app/views/user/insert/index.php';
}
public function inserted() {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST["insert_name"];
$email = $_POST["insert_email"];
$mobile_number = $_POST["insert_mobile_number"];
$this->userModel->create($name, $email,$mobile_number);
} else {
echo "Form data is not submitted.";
}
}

public function display() {
$data = $this->userModel->show();
require_once '../app/views/user/display/index.php';
}

public function edit() {
require_once '../app/views/user/edit/index.php';
}
public function fetch_display() {
$data = $this->userModel->show();
require_once '../app/views/user/fetch_display/index.php';
}
public function edit_final($id) {
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile_number = $_POST['mobile'];
$this->userModel->update($id, $name, $email,$mobile_number);
exit();
}


public function delete() {
require_once '../app/views/user/delete/index.php';
}
public function delete_fetch() {
$data = $this->userModel->show();
require_once '../app/views/user/delete_fetch/index.php';
}
public function deleted($id) {
$id = $_POST['id'];
$this->userModel->delete($id);
exit();
}
public function check_email() {
    $email = $_POST['email'];
    $this->userModel->check_email($email);
    exit();
    }
    
    public function check_mobile() {
    $mobile = $_POST['mobile'];
    $this->userModel->check_mobile($mobile);
    exit();
    }
public function signup() {
require_once '../app/views/user/signup/index.php';
}
public function signup_inserted() {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST["name"];
$email = $_POST["email"];
$mobile_number = $_POST["mobile"];
$this->userModel->create($name, $email,$mobile_number);
} else {
echo "Form data is not submitted.";
}
}


public function about() {        
    // Pass data to the view
    require_once '../app/views/user/about/index.php';
    }
    
    public function contact() {        
    // Pass data to the view
    require_once '../app/views/user/contact/index.php';
    }

}
