<?php

require('core/bootstrap.php');

use App\Models\Account;
use App\Models\User;
use App\Controllers\Controller;

$accounts = Account::all();

// $fake_account = Controller::create_fake_account();
// $fake_user = Controller::create_fake_user();
// $fake_transaction = Controller::create_fake_transaction();

?>

<?php include('templates/header.php'); ?>
<h3>Bankkonton</h3>

<?php foreach ($accounts as $account) { 
	$user = User::find($account->owner);
	?>
	<span><?php echo $account->id ?></span>
	|
	<a href="owner.php?owner_id=<?php echo User::find($account->owner)->id; ?>">
		<?php echo $user->name; ?></li>
	</a>
	<span><?php echo $account->balance ?></span>
	<hr>
	<br>
<?php } ?>

<?php include('templates/footer.php'); ?>