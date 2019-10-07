<?php 

namespace App\Extensions;

use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class AccessTokenGuard implements Guard
{
	use GuardHelpers;
	private $inputKey = '';
	private $storageKey = '';
	private $request;
	public function __construct (UserProvider $provider) {
		$v = $provider;	
    }
    
	public function user () {
		
    }
    
	/**
	 * Get the token for the current request.
	 * @return string
	 */
	public function getTokenForRequest () {
		
	}
	/**
	 * Validate a user's credentials.
	 *
	 * @param  array $credentials
	 *
	 * @return bool
	 */
	public function validate (array $credentials = []) {
		
	}
}