<?php

namespace App\Custom\CustomModelNotFoundResponse\Contracts;

interface ModelNotFoundResponseContract
{
    public function getMessage() : string ;
    
    public function getResponse();
}
