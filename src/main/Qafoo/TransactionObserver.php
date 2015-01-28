<?php

namespace Qafoo;

interface TransactionObserver
{
    public function notifyDeposit($amount);

    // ... more events ...
}
