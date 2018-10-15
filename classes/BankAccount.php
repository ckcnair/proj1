<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        
        //depositing money increases the balance
        $this->balance = bcadd($amount, $this->balance);
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
    }
    
    public function withdraw(Money $amount){
         //implementing withdraw money method 
         //withdrawing decreses the balance
        $this->balance = bcsub($this->balance,$amount);
    }
}