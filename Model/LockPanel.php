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
namespace CRT0\LockPanel\Model;
use Magento\Framework\Webapi\Rest\Request;
use CRT0\LockPanel\Api\LockPanelInterface;
use CRT0\LockPanel\Service\ManagerLock;
use CRT0\LockPanel\Helper\Strings;
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
            return Strings::RESPONSE_LOCK_IS;
        }
        return Strings::RESPONSE_LOCK_ISNOT;
    }    
    /**
     * lockPanel
     *
     * @return string
     */
    public function lockPanel(): string{
        $pwd = $this->getPassword();
        if ($this->managerLock->lock($pwd)){
            return Strings::RESPONSE_LOCK;
        }
        return Strings::RESPONSE_NOTLOCK;
    }    
    /**
     * unlockPanel
     *
     * @return string
     */
    public function unlockPanel() : string{
        $pwd = $this->getPassword();
        if ($this->managerLock->unlock($pwd)){
            return Strings::RESPONSE_UNLOCK;
        }
        return Strings::RESPONSE_NOTUNLOCK;
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
    private function getPassword(): string{
        $pwd = $this->request->getParam(Strings::CONFIGID_PWD);
        return $pwd ?? '';
    }
}