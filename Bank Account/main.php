<?php
require_once 'Account.php';

$savingAcc = new SavingAccount('SA123', 1000, 5);
$savingAcc->deposit(500);
$savingAcc->withdraw(200);
$savingAcc->addInterest();
echo "Saving Account Balance: " . $savingAcc->getbalance() . "\n";

$currentAcc = new CurrenctAccount('CA123', 500, 200);
$currentAcc->deposit(300);
$currentAcc->withdraw(1000);
echo "Current Balance: " . $current->getBalance() . "\n";