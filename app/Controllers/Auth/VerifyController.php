<?php
namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;
use App\Models\User;
class VerifyController extends BaseController{
    use UserAuthenticateTrait;
    public function showVerifyForm(){
        return $this->render('auth/Verify');
    }
    public function verify(){
            if(isset($_POST['verify'])){
                   $update = User::where("otp",$_POST["otp-verify"])->update([
                        'verify'=> 1
                    ]);
                    if($update){
                        session()->setFlash(\FLASH::SUCCESS, "Xác thực tài khoản thành công!");
                        return $this->render('auth/login');
                    }
                    else{
                        session()->setFlash(\FLASH::ERROR, "OTP không chính xác!");
                        return $this->render('auth/verify');
                    }
                
    }
}
}

?>