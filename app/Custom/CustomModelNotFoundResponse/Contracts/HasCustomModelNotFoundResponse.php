<?php

namespace App\Custom\CustomModelNotFoundResponse\Contracts;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Custom\CustomModelNotFoundResponse\Contracts\ModelNotFoundResponseContract;

interface HasCustomModelNotFoundResponse
{
    public function getCustomModelNotFoundResponse($request, ModelNotFoundException $exception) : ModelNotFoundResponseContract ;
}
