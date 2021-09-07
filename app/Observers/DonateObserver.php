<?php

namespace App\Observers;

use App\Models\Donate;
use Illuminate\Support\Str;

class DonateObserver
{
    public function creating(Donate $donate)
    {
        $donate->uuid=Str::uuid();
    }
}
