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
namespace CRT0\LockPanel\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Exception\LocalizedException;
use CRT0\LockPanel\Service\ManagerLock;
use CRT0\LockPanel\Helper\Config;
use CRT0\LockPanel\Helper\Strings;
class beforeAdminLogin implements ObserverInterface
{    
    public function __construct(
        protected ManagerLock $managerLock,
        protected Config $config
    ){
    }
    /**
     * execute
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $event)
    {  
        $userId = $event->getEvent()->getData(Strings::LABEL_USERID);
        if ($this->managerLock->canBlockPanel($userId)){
            throw new LocalizedException(__($this->config->getErrorMessage()));
        }
    }
}