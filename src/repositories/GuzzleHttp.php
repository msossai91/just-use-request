<?php

namespace Msossai91\JustUseRequest\Repositories;

use GuzzleHttp\Client;

class GuzzleHttp
{
    private $client;

    private $url;
    private $params;
    private $requestHeader;
    private $json;
    private $multipart;

    public function __construct()
    {
        $this->resetAllVariables();
    }

    private function resetAllVariables()
    {
        $className = get_class($this);
        $variables = get_class_vars($className);

        foreach($variables as $variableName => $variableValue)
        {
            if($variableName != 'client')
            {
                $this->$variableName = false;
            }
        }
    }

    private function beginClient()
    {
        $this->client = new Client([]);
    }

    public function resetClient()
    {
        $this->client = false;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setParams(array $params)
    {
        $this->params = $params; 
        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setRequestHeader(array $header)
    {
        $this->requestHeader = ['headers' => $header];
        return $this;
    }

    public function getRequestHeader()
    {
        return $this->requestHeader['headers'];
    }

    public function getCookies()
    {
        return $this->client->getConfig('cookies');
    }

    public function getCookieByName(string $cookieName)
    {
        if(count($this->client->getConfig('cookies')->toArray()) == 0)
            return false;

        foreach($this->client->getConfig('cookies')->toArray() as $key => $value)
        {
            if($value['Name'] == $nome)
                return $value['Value'];
        }

        return false;
    }

    public function json()
    {
        $this->json = true;
        return $this;
    }

    public function multipart()
    {
        $this->multipart = true;
    }

    public function get()
    {
        if(!$this->client)
            $this->beginClient();
        
        
    }

    public function post()
    {
        if(!$this->client)
            $this->beginClient();
        
        
    }
}