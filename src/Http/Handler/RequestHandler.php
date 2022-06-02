<?php

namespace Core\Http\Handler;

use Core\Security\Password;
use Core\Contracts\ModelInterface;
use Psr\Http\Message\ServerRequestInterface;

class RequestHandler
{
    private ServerRequestInterface $request;

    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    public function handle(ModelInterface $model, string $withprefix = ''): ModelInterface
    {
        $prefix = strlen($withprefix) > 0 ? $withprefix : $model::getShortClass();
        $this->parseRequestFields($model, strtolower($prefix));
        return $model;
    }

    public function get(string $field)
    {
        $requestDatas = $this->request->getParsedBody() ?? [];
        return $requestDatas[$field];
    }

    private function parseRequestFields(ModelInterface $model, string $prefix)
    {
        $fields = $model::getColumns();
        $requestDatas = $this->request->getParsedBody() ?? [];
        foreach ($fields as $field) {
            $baseFieldName = $field->getName();
            $fieldName = $prefix . '_' . $baseFieldName;
            if (array_key_exists($fieldName, $requestDatas)) {
                $value = $requestDatas[$fieldName];
                if ($field->getType() == 'password' && $value) {
                    $value = Password::hash($value);
                }
                $method = 'set' . ucfirst($baseFieldName);
                if(in_array($method, $model::getSetters())) {
                    $model->$method($value);
                }
            }
        }
    }
}
