<?php

require('core/bootstrap.php');

use App\Models\Account;
use App\Models\User;
use App\Controllers\Controller;

$account = Account::find($_REQUEST['account_id']);
$owner = User::find($account->owner);

if (isset($_POST['amount'])) {
	$amount = $_POST['amount'];
	$desc = $_POST['desc'];
	$account->deposit($amount, $desc);
}

?>

<?php include('templates/header.php'); ?>

<?php if ($error != '') {
	echo $error;
} ?>

<h2>Deposit</h2>
<h4>Owner: <?php echo $owner->name ?></h5>

	<div class="card border-0 m-5">
		<h5 class="card-title">Account #<?php echo $account->id ?></h5>
    	<div class="card-text">
			<ul>
				<li>
					Balance: <?php echo $account->balance ?>
				</li>
				<?php if (1 == 1) { ?>
					<li>
						Transactions: 
						<ul>
							<?php $transactions = $account->getTransactions();	?>
							<?php foreach($transactions as $transaction) { ?>
								<li>
									<a href='transaction.php?tx_id=<?php echo $transaction->id ?>'>
										<?php echo $transaction->date; ?>
									</a>
									<?php echo ' - ' . $transaction->desc; ?> kr
								</li>
							<?php }; ?>
						</ul>
					</li>
				<?php }; ?>
			</ul>
		</div>
	</div>


<form method="POST" action="">
	<div class="form-group row">
		<label for="amount" class="col-sm-2 form-control-label">Amount</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="amount" id="amount" placeholder="Amount">
		</div>
	</div>

	<div class="form-group row">
		<label for="description" class="col-sm-2 form-control-label">Description</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="description" name="desc" placeholder="E.g. Groceries">
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-secondary">Deposit</button>
		</div>
	</div>
</form>

<?php include('templates/footer.php'); ?>