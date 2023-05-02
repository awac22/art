<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;   
use Illuminate\Contracts\Auth\Authenticatable;
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
		
		$emails =  $request['email'];
		 
		 $authEmail = User::where('email', $emails)->first();  
		 
		 if(is_object($authEmail)>0){
			
			Auth::login($authEmail);
		}
		
		$status = Auth::check();
		
       $array = [
            'email' => "$status",
        ];
 
      
		return response()->json($array, 202,
            [
                'Content-Type' => 'application/json',
                'Charset' => 'utf-8'
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
	
	
	public function logout(){
		
		//Session::flush();
        Auth::logout();
		
		$array = [
            'email' => "0",
        ];
 
      
		return response()->json($array, 202,
            [
                'Content-Type' => 'application/json',
                'Charset' => 'utf-8'
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		
		
		
	}
    
}