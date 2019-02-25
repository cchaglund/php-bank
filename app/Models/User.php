<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use App\Models\User;

class User extends Model {

	public $timestamps = false;

	public function accounts()
	{
		return Account::where('owner', $this->id)->get();
	}
}