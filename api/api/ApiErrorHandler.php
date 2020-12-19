<?php

namespace app\api;

use app\api\exceptions\ApiErrorException;
use app\api\exceptions\ApiValidationErrorException;
use Yii;
use yii\web\ErrorHandler;
use yii\web\Response;

class ApiErrorHandler extends ErrorHandler
{
    /**
     * {@inheritDoc}
     */
    protected function renderException($exception)
    {
        if (Yii::$app->has('response')) {
            $response = Yii::$app->getResponse();
            // reset parameters of response to avoid interference with partially created response data
            // in case the error occurred while sending the response.
            $response->isSent = false;
            $response->stream = null;
            $response->data = null;
            $response->content = null;
        }
        else {
            $response = new Response();
        }

        if ($exception instanceof ApiErrorException) {
            $response->setStatusCode(200);
            $response->data = [
                'error' => $exception->getMessage()
            ];
        }
        elseif ($exception instanceof ApiValidationErrorException) {
            $response->setStatusCode(200);
            $response->data = [
                'error' => $exception->getMessage()
            ];
        }
        else {
            $response->setStatusCodeByException($exception);
            $response->data = $this->convertExceptionToArray($exception);
        }

        file_put_contents(__DIR__.'/../runtime/aaa.log', var_export($response->data, true));

        $response->setStatusCode($exception->statusCode);
        $response->send();
    }
}
