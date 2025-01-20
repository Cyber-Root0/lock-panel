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
namespace CRT0\LockPanel\Helper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use CRT0\LockPanel\Helper\Strings;
/**
 * Helper config class
 */
class Config
{   
    // Config
    public const CONFIGID_EN = 'enable';
    public const CONFIGID_EXC = 'exception';
    public const CONFIGID_PWD = 'password';
    public const MODULE_ID = 'CRT0_LockPanel';
    /**
     * __construct
     *
     * @input ScopeConfigInterface $scopeConfig
     * @return void
     */
    public function __construct(
        protected ScopeConfigInterface $scopeConfig
    ){
    }    
    /**
     * getConfig
     *
     * @param string $id
     * @return mixed
     */
    private function getConfig(string $id): mixed{
        return $this->scopeConfig->getValue("lockpanel/general/{$id}", ScopeInterface::SCOPE_STORE);
    }    
    /**
     * getPassword
     *
     * @return string
     */
    public function getPassword(): string{
        $pwd = $this->getConfig(self::CONFIGID_PWD);
        return $pwd;
    }    
    /**
     * getUsersException
     *
     * @return array
     */
    public function getUsersException(): array{
        $userString = $this->getConfig(self::CONFIGID_EXC);
        return explode(',', $userString) ?? [];
    }    
    /**
     * getErrorMessage
     *
     * @return string
     */
    public function getErrorMessage(): string{
        return $this->getConfig(Strings::LABEL_ERRORID) ?? Strings::LABEL_ERRORMSG;
    }    
    /**
     * getModuleActive
     *
     * @return bool
     */
    public function getModuleActive(): bool{
        return (bool) $this->getConfig(self::CONFIGID_EN);
    }
    public function comparePwd(string $pwd) : bool{
        return $this->getPassword() === $pwd;
    }
}