<?php

include('core/bootstrap.php');

use App\Models\Transaction;

$transaction = Transaction::find($_REQUEST['tx_id']);

?>

<?php include('templates/header.php'); ?>

<h2>Transaction #<?php echo $transaction->id ?></h2>
<h4>Date: <?php echo $transaction->date ?></h4>
<h4>Amount: <?php echo $transaction->amount ?></h4>
<h5>Description: <?php echo $transaction->desc ?></h5>






