<?php

namespace ObserverPattern;

require_once 'IObserver.php';

class LoggerListener implements IObserver
{
    // Attributes
    private $id;

    // Constructor
    public function __construct($id)
    {
        $this->id = $id;
    }

    // Properties

    // Methods
    public function Update(IObservable $observable)
    {
        
    }
}

?>