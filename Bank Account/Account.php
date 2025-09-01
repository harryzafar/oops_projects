<?php
// namespace Account;
class Account {
    protected $accountNumber;
    protected $balance;
     public function __construct($accountNumber, $balance = 0){
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
     }

     public function deposit($amount){
        if($amount > 0){
            $this->balance += $amount;
        }
        echo "Deposited: $amount. New Balance: {$this->balance}\n";
     }

     public function withdraw($amount){
        if($amount > 0 && $amount <= $this->balance){
            $this->balance -= $amount;
            echo "Withdrew: $amount. New Balance: {$this->balance}\n";
        } else {
            echo "Withdrawal of $amount failed. Insufficient funds or invalid amount.\n";
        }
     }

     public function getbalance(){
        return $this->balance;
     }
     public function getAccountNumber(){
        return $this->accountNumber;
     }
}

class SavingAccount extends Account{
    private $interestRate;

    public function __construct($accountNumber, $balance = 0, $interestRate = 0){
        parent::__construct($accountNumber, $balance);
        $this->interestRate = $interestRate;
    }

    public function addInterest(){
        $interest = $this->balance * $this->interestRate / 100;
        $this->deposit($interest);
        echo "Interest added: $interest. New Balance: {$this->balance}\n";
    }

}

class CurrenctAccount extends Account{
    private $overdraftLimit;

    public function __construct($accountNumber , $balance = 0, $overdraftLimit = 0){
        parent ::__construct($accountNumber, $balance);
        $this->overdraftLimit = $overdraftLimit;
    }

    public function  withdraw($amount){
        if($amount > 0 && $amount <= ($this->balance + $this->overdraftLimit)){
            $this->balance -= $amount;
            echo "Withdrew: $amount. New Balance: {$this->balance}\n";
        } else {
            echo "Withdrawal of $amount failed. Exceeds overdraft limit or invalid amount.\n";
        }
    }
}