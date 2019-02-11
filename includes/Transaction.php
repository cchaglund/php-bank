<?php

class Transaction {
	protected $date;
	protected $desc;
	protected $amount;

	public function __construct($date, $desc, $amount) {
		$this->date = $date;
		$this->desc = $desc;
		$this->amount = $amount;
	}

	public function getDetails() {
		return "<p><strong>Datum:</strong> {$this->date}<br>
			<strong>Beskrivning:</strong> {$this->desc}<br>
			<strong>Belopp:</strong> {$this->amount}</p>";
	}
}
