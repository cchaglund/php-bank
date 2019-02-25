<?php

namespace App\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Models\Transaction;
use Faker\Factory;

class Controller {
	static protected $faker;
	static protected $test = "hej";

	public function __construct()
	{
		static::$faker = Factory::create();
	}

	public static function create_fake_account()
	{
		$account = new Account();
		$account->balance = static::$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
		$account->owner = static::$faker->numberBetween($min = 1, $max = 15);
		$account->save();
		return $account;
	}

	public static function create_fake_user()
	{
		$user = new User();
		$user->name = static::$faker->name;
		$user->email = static::$faker->email;
		$user->save();
		return $user;
	}

	public static function create_fake_transaction()
	{
		$transaction = new Transaction();
		$transaction->date = static::$faker->date;
		$transaction->desc = static::$faker->text;
		$transaction->amount = static::$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
		$transaction->account_id = static::$faker->numberBetween($min = 1, $max = 15);
		$transaction->save();
		return $transaction;
	}

	public function updateBalance($id, $amount, $desc)
	{
		$account = Account::find($id);
		$newBalance = $account->balance + $amount;
		if ($newBalance < 0) {
				$GLOBALS['errors'] = "Insufficient funds";
		} else {
			$account->balance = $newBalance;
			$account->update([
				'balance' => $newBalance
			]);

			$transaction = new Transaction;
			$transaction->account_id = $id;
			$transaction->date = date('Y-m-d');
			$transaction->desc = $desc;
			$transaction->amount = $amount;
			$transaction->save();
		}
	}
}