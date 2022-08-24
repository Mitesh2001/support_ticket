<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Ramsey\Uuid\Uuid;

use function PHPSTORM_META\map;

class UserController extends Controller
{
    public $rules = [];

    public function UserList(Request $request)
    {
        $search_text = $request->search_text;
        $paginate = $request->paginate ?? 0;
        $order = $request->order;

        $users = User::select(
            'id',
            'external_id',
            'first_name',
            'last_name',
            'profile_pic',
            'email',
            'user_type',
            'mobile_number',
            'state_id',
            'city_id',
            'address'
        );

        $order == "all" ? $users->latest() : $users->orderBy('first_name');

        if($search_text) {
            $users->where(function ($qeury) use ($search_text) {
                $qeury->where('first_name', 'LIKE', '%'.$search_text.'%');
                $qeury->orwhere('last_name', 'LIKE', '%'.$search_text.'%');
                $qeury->orWhere('email', 'LIKE', "%" . $search_text . "%");
                $qeury->orWhere('mobile_number', 'LIKE', "%" . $search_text . "%");
                $qeury->orWhere('address', 'LIKE', "%" . $search_text . "%");
            });
        }

        $users = $paginate ? $users->paginate() : $users->get();

        foreach ($users as $key => $user) {
            $user->full_name = $user->first_name." ".$user->last_name;
        }

        return response()->json(['user' => $users, 'status' => 'SUCCESS', 'message' => 'All Users Fetched !']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Wrong Email/Password', 'status' => 'FAIL']);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token', 'status' => 'FAIL'], 500);
        }

        $user = JWTAuth::user();

        $user->token = $token;

        $user->save();

        return response()->json(['user' => $user, 'status' => 'SUCCESS', 'message' => 'Login Successfull']);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile_number' => 'required|numeric|digits:10|unique:users',
            'user_type' => 'required|numeric',
            'password' => ['required','string',Password::min(6)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
        ]);

        if($validator->fails()){
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString //$validator->errors()->first()
            ]);
        }

        $profile_pic = "";


        if(!empty($request->profile_pic)) {
            $path = 'assets/employees/profile_pics/';
            $first_name  = strtolower(str_replace(' ', '_',$request->first_name));
            $profile_pic_name = User::createImageFromBase64($request->profile_pic, $first_name, $path);
            $profile_pic = $profile_pic_name;
        }

        $user = User::create([
            'external_id' => Uuid::uuid4()->toString(),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'state_id' => $request->get('state_id'),
            'city_id' => $request->get('city_id'),
            'user_type' => $request->get('user_type'),
            'mobile_number' => $request->get('mobile_number'),
            'address' => $request->get('address'),
            'password' => Hash::make($request->get('password')),
            'profile_pic' => $profile_pic
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(['user' => $user, 'status' => 'SUCCESS', 'message' => 'Registration Successfull !'],201);

    }

    public function userUpdate(Request $request)
    {
        $rules = [
            'email' => 'string|email|max:255'
        ];

        if ($request->has('password') and $request->password != "") {
            $rules['password'] = ['string',Password::min(6)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()];
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString //$validator->errors()->first()
            ]);
        }

        $user = User::where('external_id',$request->external_id)->first();

        $password = (!empty($request->get('password'))) ? Hash::make($request->get('password')) : $user->password;

        $email = (!empty($request->email)) ? $request->email : $user->email;

        $mobile_number = (!empty($request->mobile_number)) ? $request->mobile_number : $user->mobile_number;

        $update_array = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'state_id' => $request->get('state_id'),
            'city_id' => $request->get('city_id'),
            'address' => $request->get('address'),
            'password' => $password
        ];

        $user->update($update_array);

        if(!empty($request->profile_pic)) {
            $path = 'assets/employees/profile_pics/';
            $first_name  = strtolower(str_replace(' ', '_',$request->first_name));
            $profile_pic_name = User::createImageFromBase64($request->profile_pic, $first_name, $path);
            $user->update([
                'profile_pic' => $profile_pic_name
            ]);
        }

        unset($user->token);

        return response()->json([
            'user' => $user,
            'status' => 'SUCCESS',
            'message' => 'User Successfully Updated !']
            ,200
        );
    }

    public function profileUpdate(Request $request)
    {
        $rules = [
            'email' => 'string|email|max:255'
        ];

        if ($request->has('password') and $request->password != "") {
            $rules['password'] = ['string',Password::min(6)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()];
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString //$validator->errors()->first()
            ]);
        }

        $user = $this->getUserData();

        $password = (!empty($request->get('password'))) ? Hash::make($request->get('password')) : $user->password;
        $email = (!empty($request->email)) ? $request->email : $user->email;

        $mobile_number = (!empty($request->mobile_number)) ? $request->mobile_number : $user->mobile_number;

        $update_array = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'state_id' => $request->get('state_id'),
            'city_id' => $request->get('city_id'),
            'address' => $request->get('address'),
            'password' => $password
        ];

        $user->update($update_array);

        if(!empty($request->profile_pic)) {
            $path = 'assets/employees/profile_pics/';
            $first_name  = strtolower(str_replace(' ', '_',$request->first_name));
            $profile_pic_name = User::createImageFromBase64($request->profile_pic, $first_name, $path);
            $user->update([
                'profile_pic' => $profile_pic_name
            ]);
        }

        unset($user->token);

        return response()->json([
            'user' => $user,
            'status' => 'SUCCESS',
            'message' => 'Profile Successfully Updated !']
            ,200
        );
    }

    public function getAuthenticatedUser()
    {

        $user = $this->getUserData();
        $user->full_name = $user->first_name." ".$user->last_name;

        unset($user->token);

        return response()->json([
            'status' => 'SUCCESS',
            'data' => ['user' => $user],
            'message' => ''
        ]);

    }

    public function logout(Request $request)
    {

        $user = JWTAuth::parseToken()->authenticate();
        if ($user) {
            $user->token = null;
            $user->save();
        }

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json([
                'status' => 'SUCCESS',
                'message' => "You have successfully logged out."
            ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([
                'status' => 'FAIL',
                'message' => 'Failed to logout, please try again.'
            ]);
        }
    }

    public function getUserData()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json([
                    'status' => 'FAIL',
                    'message' => 'User not found.'
                ]);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        $user = User::where('id', $user->id)->first();

        return $user;
    }

    public function forgotpassword(Request $request)
    {
        $email = $request->email;

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString //$validator->errors()->first()
            ]);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'FAIL',
                'message' => 'Your account is not associated with us.'
            ]);
        } else {

            $otp = $this->generateOTP($user,15);
            $message = $this->getTemplate($otp, 15);

            $message =  (new MailMessage)
                ->subject(Lang::get('Reset Password Notification'))
                ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
                ->line(Lang::get('OTP : '. $otp))
                ->line(Lang::get('This OTP will expire in 15 minutes.'))
                ->line(Lang::get('If you did not request a password reset, no further action is required.'));
            $data['subject'] = "Forgot password";
            $data['messagecontent'] = $message;

            Mail::send('emails.forgotpassword', $data, function($message)use($data, $email) {
                $message->subject($data['subject']);
                $message->to($email);
            });

            return response()->json([
                'status' => 'SUCCESS',
                'user_id' => $user->id,
                'message' => 'We have sent you a reset password link. Please check your email account for further instructions.',
            ]);
        }

    }

    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:6',
        ]);
        if ($validator->fails()) {
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString
            ]);
        }
        $user = User::find($request->user_id);
        if ($user->otp == $request->otp && $user->otp_expired_at > Carbon::now()) {
            $user->otp = null;
            $user->otp_expired_at = null;
            $user->otp_verified_at = Carbon::now();
            $user->save();
            return response()->json([
                'status' => 'SUCCESS',
                'user_id' => $user->id,
                'message' => 'OTP has been verified successfully.'
            ]);
        } elseif ($user->otp != $request->otp) {
            return response()->json([
                'status' => 'FAIL',
                'message' => 'OTP is invalid.'
            ]);
        } else {
            return response()->json([
                'status' => 'FAIL',
                'message' => 'OTP has expired.'
            ]);
        }
    }

    public function resetpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required','string',Password::min(6)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()]
        ]);

        if ($validator->fails()) {
            $errorString = implode(",", $validator->messages()->all());
            return response()->json([
                'status' => 'FAIL',
                'message' => $errorString
            ]);
        }

        $user = User::find($request->user_id);

        if ($user) {

            if ($user->otp_verified_at == null) {
                return response()->json([
                    'status' => 'FAIL',
                    'message' => 'OTP is not verified !'
                ]);
            } else {
                $user->password = Hash::make($request->password);
                $user->otp_verified_at = null;
                $user->save();
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Your password has been set successfully.'
                ]);
            }

        } else {
            return response()->json([
                'status' => 'FAIL',
                'message' => 'Something went to wrong!.'
            ]);
        }
    }

    public function getTemplate($otp, $minutes)
    {
        $html = "You are receiving this email because we received a password reset request for your account.\n";
        $html .= "Your OTP is $otp.";
        $html .= "This OTP reset link will expire in $minutes minutes.\n";
        $html .= "If you did not request a password reset, no further action is required.\n";
        return $html;
    }

    public function generateOTP($user, $min)
    {
        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expired_at = Carbon::now()->addMinutes($min);
        $user->otp_verified_at = null;
        $user->save();

        return $otp;
    }
}
