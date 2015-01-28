<?php

namespace Qafoo;

interface AccountFeeCalculator
{
    public function calculateFees($currentBalance, \DateTime $now);
}
