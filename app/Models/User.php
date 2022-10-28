<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'ID_user';
    public $timestamps = false;
    protected $fillable = [
        'ID_user',
        'full_name',
        'email',
        'username',
        'otp',
        'verify'
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'ID_user');
    }
    public $errors = [];
    public function validate($data = [])
    {
        $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
        if (!preg_match($pattern, $data['username'])) {
            $this->errors['username'] = 'Only letters, numbers, underscore and at least 6 character long allowed';
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }

        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
        if (!preg_match($pattern, $data['password'])) {
            $this->errors['password'] = 'Password must contains at least one capitalize letter, number and special character.';
        }

        if ($data['password'] != $data['confirm_password']) {
            $this->errors['confirm_password'] = 'Password does not match.';
        }
        $user = User::where(['username' => $data['username']])->first();
        if ($user) {
            $this->errors['username'] = 'This username is already taken. Please choose another one.';
        }
        $email = User::where(['email' => $data['email']])->first();
        if ($email) {
            $this->errors['email'] = 'This email is already taken. Please choose another one.';
        }
        if (count($this->errors)) {
            return false;
        }
        return true;
    }
}
