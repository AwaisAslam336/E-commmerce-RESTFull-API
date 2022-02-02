<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, Exception $e)
    {   
        if($e instanceof ModelNotFoundException){
            return $this->ModelResponse($e);
        }

        if($e instanceof NotFoundHttpException){
            return $this->HttpResponse($e);
        }

        return parent::render($request,$e);
    }

    protected function ModelResponse($e){
        return response()->json([
            'errors'=>'Product Model not found'
        ],Response::HTTP_NOT_FOUND);
    }

    protected function HttpResponse($e){
        return response()->json([
            'errors'=>'Incorrect Route'
        ],Response::HTTP_NOT_FOUND);
    }
}