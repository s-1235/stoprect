<?php

namespace App\Http\Controllers;

use App\Helpers\MessageHelper;
use App\Models\Asset;
use App\Models\Record;
use App\Models\UserSubscription;
use App\Traits\FileHandler;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Ramsey\Uuid\Codec\encode;

class UserController extends Controller
{
    use MessageHelper;
    
    public function index()
    {
        $users = User::has('subscription')->get();
        $user = Auth::user();
        // add userPlanName to user
        return view('dashboard.users',[
            'user' => $user,
            'users' => $users,
        ]);
    }

    public function editForm(Request $request)
    {
        $user = Auth::user();
        $userEdit = User::find($request->get('id'));
        
        //user subscribes delete too1
        return view('dashboard.forms.edit-user',[
            'user_edit' => $userEdit,
            'user' => $user
        ]);
    } 
    
    public function edit(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email',
            ]);
        
        $userEdit = User::find($request->get('id'));
//        $userEdit->username = $request->get('username');
        $userEdit->first_name = $request->get('first_name');
        $userEdit->last_name = $request->get('last_name');
        $userEdit->email = $request->get('email');
        $userEdit->status = $request->get('status');
        if ($request->get('password')) {
            $userEdit->password = bcrypt($request->get('password'));
        }
        $userEdit->save();
        //user subscribes delete too1
        return redirect()->back()->withInput();
    }
    
    
    public function delete(Request $request)
    {
     
        $user = User::find($request->get('id'));
        UserSubscription::where('user_id', $user->id)->delete();
        UserSubscription::where('email', $user->email)->delete();
        $user->delete();
        
        //user subscribes delete too1
        return redirect()->back();
    }

    public function forgotPassword()
    {
        
        return view('forgot-password');
    }

    public function sendForgotPasswordLink(Request $request)
    {
        $request->validate( [
            'email' => 'email|exists:users'
        ]);
        $token = bcrypt($request->all()['email']);
        DB::table('password_resets')
            ->insert(
                [
                    'email' => $request->all()['email'],
                    'token' => $token
                ]
            );


        $body = $this->generateBodyResetPassword($token);

        mail( $request->get('email'),"Password recovery", $body);

        return response('We sent you email with link for recovery', 200);
    }

    /**
     * @param string $token
     *
     * @return string
     */
    protected function generateBodyResetPassword(string $token): string
    {
        $link = env('APP_URL') . '/setup-new-password-form?valid=' . $token;
        $body = "Hello, please follow the link to change your password" . PHP_EOL . $link . PHP_EOL . '(the link expires in 24 hours)';

        return $body;
    }

    public function setupNewPassword(Request $request)
    {
        Log::alert("Request set up new pass", [$request->all()]);
        $request->validate([
            'password' => 'required'
        ]);

        User::where('email', $request->email)->update([
            'password' => bcrypt($request->get('password'))
        ]);
        $credentials = $request->all();
        if (Auth::attempt($credentials)) {
            return response(route('my-account'), 200);
        }
        Log::channel('errors')->alert("Wrong credentials", [$credentials]);
        
        return response('error',500);
    }

    public function setupPasswordForm(Request $request)
    {
        return view('forms.setup-new-password', [
            'email' => $request->get('email')
        ]);
    }

}
