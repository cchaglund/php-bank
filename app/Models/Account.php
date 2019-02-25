<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use App\Controllers\Controller;

class Account extends Model {
	protected $guarded = [];
	public $timestamps = false;

	public function getTransactions()
	{
		return Transaction::where('account_id', $this->id)->get();
	}

	public function getAccountNumber() {
		return $this->accountNumber;
	}

	public function withdraw($amount, $desc)
	{
		$amount = '-' . $amount;
		$newBalance = $this->balance + $amount;
		if ($newBalance < 0) {
				$GLOBALS['errors'] = "Insufficient funds";
		} else {
			$this->balance = $newBalance;
			$this->save();

			$this->createTransaction($amount, $desc);	
		}
	}

	public function deposit($amount, $desc)
	{
		$newBalance = $this->balance + $amount;
		$this->balance = $newBalance;
		$this->save();

		$this->createTransaction($amount, $desc);	
	}

	public function createTransaction($amount, $desc)
	{
		$transaction = new Transaction;
			$transaction->account_id = $this->id;
			$transaction->date = date('Y-m-d');
			$transaction->desc = $desc;
			$transaction->amount = $amount;
			$transaction->save();
	}
}
