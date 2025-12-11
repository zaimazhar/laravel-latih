<?php

namespace App\Events;

use Thunk\Verbs\Event;

class CustomerBeganTrial extends Event
{
    public int $customerId;
}
