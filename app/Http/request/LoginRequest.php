<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors();

        if ($errors->has('email') && preg_match('/The email field is required/', $errors->first('email'))) {
            throw ValidationException::withMessages([
                'email' => 'Alamat email harus diisi.',
            ]);
        } elseif ($errors->has('email') && preg_match('/These credentials do not match our records/', $errors->first('email'))) {
            throw ValidationException::withMessages([
                'email' => 'Kredensial yang Anda masukkan salah.',
            ]);
        } elseif ($errors->has('password') && preg_match('/The password field is required/', $errors->first('password'))) {
            throw ValidationException::withMessages([
                'password' => 'Kata sandi harus diisi.',
            ]);
        } 

        // ... (penanganan kesalahan lainnya)
    }
}
