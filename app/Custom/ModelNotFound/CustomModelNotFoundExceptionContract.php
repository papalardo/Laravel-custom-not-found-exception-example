<?php

namespace App\Custom\ModelNotFound;

use App\Custom\ModelNotFound\CustomModelNotFound;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface CustomModelNotFoundExceptionContract
{
    public function getCustomModelNotFound($request, ModelNotFoundException $exception) : CustomModelNotFound ;
}
