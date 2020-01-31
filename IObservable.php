<?php

namespace ObserverPattern;

require_once 'IObserver.php';

interface IObservable
{
    public function Add(IObserver $observer);
    public function Remove(IObserver $observer);
    public function Notify();
}

?>