<?php

namespace ObserverPattern;

require_once 'IObservable.php';

class Logger implements IObservable
{
    // Attributes
    private $observer;

    // Constructor
    public function __construct()
    {

    }

    // Properties

    // Methods
    public function Add(IObserver $observer)
    {
        $this->observer = $observer;
    }
    
    public function Remove(Iobserver $observer)
    {
        
    }
    
    public function Notify()
    {
        $observer->Update($this);
    }
}

?>