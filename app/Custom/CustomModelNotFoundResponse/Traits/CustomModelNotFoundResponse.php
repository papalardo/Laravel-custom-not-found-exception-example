<?php

namespace App\Custom\CustomModelNotFoundResponse\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Custom\CustomModelNotFoundResponse\Response\ModelNotFoundResponse;
use App\Custom\CustomModelNotFoundResponse\Contracts\HasCustomModelNotFoundResponse;

trait CustomModelNotFoundResponse
{
    private function handleModelNotFoundException($request, ModelNotFoundException $exception) {
        $model = app($exception->getModel());

        if($model instanceof HasCustomModelNotFoundResponse) {
            $response = $model->getCustomModelNotFoundResponse($request, $exception);

            return $request->wantsJson() ? 
                parent::render($request, new ModelNotFoundException($response->getMessage(), $exception->getCode(), $exception)) : 
                $response->getResponse();
        }
    }
}
