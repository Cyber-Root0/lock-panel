<?php
/**
 * Copyright (c) 2025 Bruno Alves. All rights reserved.
 *
 * This file is part of the CRT0 LockPanel module for Magento 2.
 *
 * @package   CRT0_LockPanel
 * @author    Bruno Alves <boteistem@gmail.com>
 * @license   MIT
 * @link      https://github.com/Cyber-Root0
 * @version   1.0.0
 * @since     2025
 */
declare(strict_types=1);
namespace CRT0\LockPanel\Model;
use Magento\Framework\Phrase;
use Magento\Framework\Webapi\Rest\Request;
use CRT0\LockPanel\Api\LockPanelInterface;
use CRT0\LockPanel\Service\ManagerLock;
use CRT0\LockPanel\Helper\Strings;
use CRT0\LockPanel\Helper\Config;
class LockPanel implements LockPanelInterface{    
    /**
     * __construct
     *
     * @param Request $request
     * @param ManagerLock $managerLock
     * @return void
     */
    public function __construct(
        protected Request $request,
        protected ManagerLock $managerLock
    ){
    }    
    /**
     * getStatus
     *
     * @return string
     */
    public function getStatus() : string{
        $pwd = $this->getPassword();
        if ($this->managerLock->isLock($pwd)){
            return $this->response(__(Strings::RESPONSE_LOCK_IS));
        }
        return $this->response(__(Strings::RESPONSE_LOCK_ISNOT), 400);
    }    
    /**
     * lockPanel
     *
     * @return string
     */
    public function lockPanel(): string{
        $pwd = $this->getPassword();
        if ($this->managerLock->lock($pwd)){
            return $this->response(__(Strings::RESPONSE_LOCK));
        }
        return $this->response(__(Strings::RESPONSE_NOTLOCK), 400);
    }    
    /**
     * unlockPanel
     *
     * @return string
     */
    public function unlockPanel() : string{
        $pwd = $this->getPassword();
        if ($this->managerLock->unlock($pwd)){
            return $this->response(__(Strings::RESPONSE_UNLOCK));
        }
        return $this->response(__(Strings::RESPONSE_NOTUNLOCK), 400);
    }    
    /**
     * response
     *
     * @param Phrase $message
     * @param int $code
     * @return string
     */
    private function response(Phrase $message, int $code = 200): string{
        return json_encode(
            [
                'message' => $message->render(),
                'code' => $code
            ]
        );
    }    
    /**
     * getPostParams
     *
     * @return mixed
     */
    private function getPostParams(): mixed
    {
		return $this->request->getBodyParams();
    }    
    /**
     * getPassword
     *
     * @return string
     */
    private function getPassword(): string{
        $pwd = $this->request->getParam(Config::CONFIGID_PWD);
        return $pwd ?? '';
    }
}