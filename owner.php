<?php

include('core/bootstrap.php');

use App\Models\User;

$owner = User::find($_REQUEST['owner_id']);
$accounts = $owner->accounts();

?>

<?php include('templates/header.php'); ?>

<h4>Accounts for <?php echo $owner->name ?></h5>

<?php foreach ($accounts as $account) { ?>
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
			<a href="deposit.php?account_id=<?php echo $account->id ?>"><button type="button" class="btn btn-success">Deposit</button></a>
			<a href="withdraw.php?account_id=<?php echo $account->id ?>"><button type="button" class="btn btn-warning">Withdraw</button></a>
		</div>
	</div>
<?php }; ?>





