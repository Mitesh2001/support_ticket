<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;
use Storage;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'user_type',
        'mobile_number',
        'state_id',
        'city_id',
        'address',
        'profile_pic',
        'external_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'otp_expired_at',
        'otp',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function createImageFromBase64($file, $file_name, $path){
        $extension = explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($file, 0, strpos($file, ',') + 1);
        // find substring fro replace here eg: data:image/png;base64,
        $newFile = str_replace($replace, '', $file);
        $newFile = str_replace(' ', '+', $newFile);

        $fileName = $file_name ."_". time() .".". $extension;

        if(env('APP_ENV') == 'local') {
            $upoad_path =  $path . $fileName;
        } else {
            $upoad_path = 'public/'. $path . $fileName;
        }

        // Storage::put($fileName, base64_decode($newFile));
        Storage::disk('local')->put($upoad_path, base64_decode($newFile));

        $fullPath = 'storage/'. $path . $fileName;

        return $fullPath;
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
