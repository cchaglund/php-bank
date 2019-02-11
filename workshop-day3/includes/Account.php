<?php

class Account {

	protected $accountNumber;
	protected $balance;
	protected $owner;

	public function __construct($accountNumber, $owner, $balance = 0) {
		$this->accountNumber = $accountNumber;
		$this->owner = $owner;
		$this->balance = $balance;
	}

	public function deposit($amount) {
		// $this->balance = $this->balance + $amount; // samma sak som nedan men mer verbose
		$this->balance += $amount;
	}

	public function withdraw($amount) {
		// $this->balance = $this->balance - $amount; // samma sak som nedan men mer verbose
		$this->balance -= $amount;
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
}
