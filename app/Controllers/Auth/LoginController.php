<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;
use App\Models\User;
use App\Models\Account;
use App\Models\Product;

class LoginController extends BaseController{
    use UserAuthenticateTrait;
    public function showLoginForm(){
        
        return $this->render('auth/Login');
    }

    public function login(){
        
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        $verify_status= User::where('username', $_POST['username'])->first()->verify;
        $email= User::where('username', $_POST['username'])->first()->email;
        $role = Account::where('username', $_POST['username'])->first()->role;
        if($verify_status==0 && $role == 0){
            session()->setFlash(\FLASH::ERROR, "Mã OTP đã được gửi đến $email");
            return $this->render('auth/verify');
        }
        else{
            if ($user) {
                
                $user->password = null; // remove password
                session()->set('user', serialize($user)); // chuyển model sang chuỗi
    
                if (isset($_POST['remember_me'])) {
    
                    // chuyển mảng sang chuỗi để mã hóa
                    $str = serialize($credentials);
    
                    // hàm mã hóa chuỗi được định nghĩa trong helpers.
                    $encrypted = encrypt($str, ENCRYPTION_KEY);
    
                    // cookie hết hạn 01/12/2022 23:59:59
                    setcookie('credentials', $encrypted, mktime(23, 59, 59, 12, 1, 2022));
                }
               
                if ($user->role === 0) {
                   return $this->redirect('/home');
                } 
                
                else if($user->role === 1){
                   return redirect('/admin');
                }
            }
            session()->setFlash(\FLASH::ERROR,"Username or Password is invalid");
            return $this->render('auth/Login');
        }
        
        // nếu login sai show form login và hiển thị lỗi
        
    }


    public function logout()
    {

        $this->signout();
        //redirect('/home');
        $this->redirect('/home');
    }

    public function getCredentials()
    {
        return [
            'username'  => $_POST['username'] ?? null,
            'password'  => $_POST['password'] ?? null,
        ];
    }
}

?>