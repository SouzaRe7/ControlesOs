<?php

namespace Src\VO;

use Src\_public\Util;

class LogVO
{
    private $ip;
    public function setIp($ip)
    {
        $this->ip = Util::TratarDados($ip);
    }
    public function getIp()
    {
        return $this->ip;
    }
}
