<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

class ReglaPassword extends Password
{
    protected $requireUppercase = true;
}
