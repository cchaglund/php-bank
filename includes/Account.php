<?php

require_once("includes/Transaction.php");

class Account {

	protected $accountNumber;
	protected $balance;
	protected $owner;
	protected $transactions = [];

	public function __construct(String $accountNumber, String $owner, Float $balance = 0) {
		$this->accountNumber = $accountNumber;
		$this->owner = $owner;
		$this->balance = $balance;
	}

	public function deposit(Float $amount, $date = false, $desc = "") {
		$this->balance += $amount;

		// skapa en transaktion för insättningen
		$transaction = new Transaction($amount, $date, $desc);
		array_push($this->transactions, $transaction);
	}

	public function withdraw(Float $amount, $date = false, $desc = "") {
		$this->balance -= $amount;

		// skapa en transaktion för uttaget
		$transaction = new Transaction($amount, $date, $desc);
		array_push($this->transactions, $transaction);
	}

	public function getAccountNumber() {
		return $this->accountNumber;
	}

	public function getCurrentBalance() {
		return $this->balance;
	}

	public function getOwner() {
		return $this->owner;
	}

	public function getTransactions() {
		return $this->transactions;
	}
}
