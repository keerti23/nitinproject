<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public static function rules($action,$id=NULL){
        $rules = [
            'login' => [
                'email' => 'required|email',
                'password' => 'required',
            ],
            'passwordReset' =>[
                'oldpassword'   =>'required',
                'newpassword'   =>'required|same:confirmpassword',
                'confirmpassword'=>'required',
            ],
            'update' =>[
                'name'           =>'required',
                'email'          =>'required|email|unique:admins,email,'.$id,
            ]
        ];
        return $rules[$action];
    }

}
