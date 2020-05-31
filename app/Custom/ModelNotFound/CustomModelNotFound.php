<?php

namespace App\Custom\ModelNotFound;

use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomModelNotFound
{
    protected $view = 'errors.404';

    protected $viewData = [];
    
    protected $message = 'Registo não encontrado';

    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    public function setView($view) {
        $this->view = $view;

        return $this;
    }

    public function setViewData(array $viewData)
    {
        $this->viewData = $viewData;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getView() 
    {
        return view(
            $this->view, 
            array_merge($this->viewData, [ 'message' => $this->getMessage() ])
        );
    }
}
