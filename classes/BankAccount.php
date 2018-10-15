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
        //implementing transfer method
        //transfering money decreases balance from target account
        $this->balance = bcsub($this->balance,$amount);
        //Transfering money increases balance on destination account
        $account->balance = bcadd($amount, $account->balance);
    }
    
    public function withdraw(Money $amount){
         //implementing withdraw money method 
        // Throwing exception when withdrawing more than closing balance
        if($amount > $this->balance){
            throw new Exception("Withdrawl amount larger than balance");
        }
         //withdrawing decreses the balance
        $this->balance = bcsub($this->balance,$amount);
    }
}