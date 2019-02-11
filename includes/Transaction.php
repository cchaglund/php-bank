<?php

class Transaction {
	protected $date;
	protected $desc;
	protected $amount;

	public function __construct($amount, $date = false, $desc = "") {
		if ($date) {
			$this->date = $date;
		} else {
			$this->date = date("Y-m-d");
		}
		$this->desc = $desc;
		$this->amount = $amount;
	}

	public function getDetails() {
		return "<p><strong>Datum:</strong> {$this->date}<br>
			<strong>Beskrivning:</strong> {$this->desc}<br>
			<strong>Belopp:</strong> " . number_format($this->amount, 2, ',', ' ') . " kr</p>";
	}
}
