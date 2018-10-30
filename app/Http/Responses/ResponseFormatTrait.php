<?php

namespace App\Http\Responses;

use App\Exceptions\ExceptionCode;
use App\Exceptions\ResponseCode;

trait ResponseFormatTrait
{
    /**
     * Check accept content-type, then return related
     * response content in terms of content-type
     *
     * Notice: template path will be parsed by template name
     *         and response contentType, the rule as below:
     *         templatePath = templateName-respContentType.blade.php
     *         for example common.navigation with json format will be
     *         resource/views/common/navigation-json.blade.php
     *
     * @param string $template template name
     * @param array  $data     data need by template
     * @param string $message
     * @param int    $code
     *
     * @return \Illuminate\Http\Response
     */
    protected function render(
        array $data = [],
        $message = 'OK',
        $code = ResponseCode::HTTP_RESPONSE_OK
    ) {
        return $this->genResponse(
            [
                'code'    => $code,
                'data'    => $data,
                'message' => $message,
            ]
        );
    }

    /**
     * @param $message
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    protected function error($message, $code = ResponseCode::HTTP_RESPONSE_NOT_KNOW)
    {
        return $this->genResponse(
            [
                'code'    => $code,
                'data'    => [],
                'message' => $message,
            ]
        );
    }

    /**
     * Response info message
     *
     * @param string $message
     *
     * @return \Illuminate\Http\Response
     */
    protected function renderInfo($message, $code)
    {
        return $this->genResponse(
            [
                'code'    => 0,
                'data'    => [],
                'message' => $message,
            ]
        );
    }

    /**
     * Responses error  message
     *
     * @param \Exception|string $data exception or error message
     * @param int               $code error code
     *
     * @return \Illuminate\Http\Response
     */
    protected function renderError(
        $data,
        $code = ExceptionCode::GENERAL
    ) {
        $template = 'errors.custom';
        if ($data instanceof \Exception) {
            $code = $data->getCode() ?: $code;
            $message = $data->getMessage();

            // in case debug enabled
            if (config('app.debug')) {
                $exception['trace'] = $data->getTrace();
                $exception['line'] = $data->getLine();
                $exception['file'] = $data->getFile();
            }

            return $this->genResponse(
                [
                    'code'      => $code,
                    'data'      => [],
                    'message'   => $message,
                    'exception' => empty($exception) ? [] : $exception,
                ]
            );
        }

        return $this->genResponse(
            [
                'code'    => $code,
                'data'    => [],
                'message' => $data,
            ]
        );
    }

    /**
     * Get response format and contentType
     */
    protected function getResponseFormat()
    {
        static $respFormats = [
            'json' => 'application/json',
            'xml'  => 'text/xml',
            'txt'  => 'text/plain',
            'html' => 'text/html',
        ];
        $respFormat = request()->format();
        if ( ! isset($respFormats[$respFormat])) {
            $respFormat = 'txt';
        }
        $respContentType = $respFormats[$respFormat];

        return [$respFormat, $respContentType];
    }

    /**
     * Generate response
     *
     * @param string $template template name
     * @param array  $data
     *
     * @return \Illuminate\Http\Response
     */
    protected function genResponse(array $data)
    {
        list($respFormat, $respContentType) = $this->getResponseFormat();
        $reData =  [
            'code'      => $data['code'],
            'data'      => $data['data'],
            'message'   => $data['message'],
            'exception' => isset($data['exception']) ? $data['exception'] : [],
        ];

        return response($reData)
            ->header('Content-Type', $respContentType);
    }

    /**
     * 需要返回页码及总数据量时的输出
     *
     * @param string $template template name
     * @param array  $data     data need by template
     * @param string $message
     * @param int    $code
     * @param        int       page
     * @param        int       totalCount
     *
     * @return \Illuminate\Http\Response
     */
    protected function listRender(
        $template,
        array $data = [],
        $message = '',
        $code = 0,
        $page = 0,
        $totalCount = 0
    ) {
        return $this->genListResponse(
            $template,
            [
                'code'       => $code,
                'data'       => $data,
                'message'    => $message,
                'page'       => $page,
                'totalCount' => $totalCount,
            ]
        );
    }

    /**
     * Generate list response
     *
     * @param string $template template name
     * @param array  $data
     *
     * @return \Illuminate\Http\Response
     */
    protected function genListResponse($template, array $data)
    {
        list($respFormat, $respContentType) = $this->getResponseFormat();
        $template = rtrim($template, '.') . '-' . $respFormat;

        return response()
            ->view(
                $template,
                [
                    'code'       => $data['code'],
                    'data'       => $data['data'],
                    'message'    => $data['message'],
                    'page'       => $data['page'],
                    'totalCount' => $data['totalCount'],
                    'exception'  => isset($data['exception']) ? $data['exception'] : [],
                ]
            )
            ->header('Content-Type', $respContentType);
    }
}
