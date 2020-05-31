<?php

namespace App\Custom\CustomModelNotFoundResponse\Response;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Custom\CustomModelNotFoundResponse\Settings\CustomModelNotFoundSettings;
use App\Custom\CustomModelNotFoundResponse\Contracts\ModelNotFoundResponseContract;

class ModelNotFoundResponse implements ModelNotFoundResponseContract
{
    /**
     * Response
     */
    protected $response;

    protected Request $request;

    protected ModelNotFoundException $exception;

    protected $view;

    protected $message;

    function __construct(Request $request, ModelNotFoundException $exception) {
        $this->request = $request;
        $this->exception = $exception;

        $this->setDefaultSettings($exception);
    }
    
    protected function setDefaultSettings(ModelNotFoundException $exception) {
        $defaultSettings = new CustomModelNotFoundSettings;

        $this->message = $defaultSettings::getMessage() ?: $exception->getMessage();
        $this->view = $defaultSettings::getView();
    }

    public function setMessage(string $message) {
        $this->message = $message;
        return $this;
    }

    public function setView($view, array $viewData = []) 
    {
        $this->view = is_string($view) ? ViewFacade::make($view, $viewData) : $view;
        return $this;
    }

    public function setResponse($response) {
        $this->response = $response;
        return $this;
    }

    public function getStringIds() : string
    {
        return implode(',', $this->getIds());
    }

    public function getIds() : array
    {
        return $this->exception->getIds();
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function getView()  {
        return $this->view->with(array_merge([
            'message' => $this->getMessage(),
            'stringIds' => $this->getStringIds(),
            'ids' => $this->getIds(),
        ], $this->view->getData()));
    }

    public function getResponse()
    {
        return $this->response ?? ResponseFacade::make($this->getView());
    }
}
