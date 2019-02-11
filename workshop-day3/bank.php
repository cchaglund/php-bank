<?php

require("includes/Account.php");

$accounts = [];

$account = new Account("1337", "Johan", 4242);
$account->deposit(1000);
$account->withdraw(25);
$account->withdraw(149);
$account->withdraw(65);
$account->deposit(250);
array_push($accounts, $account);

$account = new Account("123456789", "Peter");
$account->deposit(0.5);
$account->withdraw(65);
$account->withdraw(300);
$account->withdraw(550);
$account->deposit(250);
array_push($accounts, $account);

$account = new Account("567891234", "Lisa", 25000);
$account->deposit(500);
$account->deposit(500);
$account->deposit(500);
$account->deposit(500);
$account->deposit(500);
$account->withdraw(65);
array_push($accounts, $account);

foreach ($accounts as $account) {
	echo "<h1>{$account->getOwner()}s konto</h1>";
	echo "<pre>Saldo: {$account->getCurrentBalance()} kr</pre>";
}
