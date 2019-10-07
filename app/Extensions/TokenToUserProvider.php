<?php 

namespace App\Extensions;

use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Str;

class TokenToUserProvider implements UserProvider
{
	private $token;
	private $user;
	public function __construct (User $user, $token) {
		$this->user = $user;
		$this->token = $token;
	}
	public function retrieveById ($identifier) {
		$v = '';
	}
	public function retrieveByToken ($identifier, $token) {
		$v = '';
	}
	public function updateRememberToken (Authenticatable $user, $token) {
		$v = '';
	}
	public function retrieveByCredentials (array $credentials) {
		$v = '';
	}
	public function validateCredentials (Authenticatable $user, array $credentials) {
		$v = '';
	}
}