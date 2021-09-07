<?php

namespace App\Observers;

class DonateObserver
{
    public function creating(Donate $donate)
    {
        $donate->uuid=Str::uuid();
    }
}
