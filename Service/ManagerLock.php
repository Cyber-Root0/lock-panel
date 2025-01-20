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
namespace CRT0\LockPanel\Service;
use Magento\Framework\FlagManager;
use CRT0\LockPanel\Helper\Config;
use CRT0\LockPanel\Helper\Strings;
class ManagerLock
{
    public const FLAG = Strings::ADMIN_LOCK_FLAG;

    public function __construct(
        protected FlagManager $flagManager,
        protected Config $config
    ) {}

    /**
     * Lock the admin panel
     *
     * @param string $pwd
     * @return bool
     */
    public function lock(string $pwd): bool
    {
        return $this->toggleLock($pwd, true);
    }

    /**
     * Unlock the admin panel
     *
     * @param string $pwd
     * @return bool
     */
    public function unlock(string $pwd): bool
    {
        return $this->toggleLock($pwd, false);
    }

    /**
     * Check if the admin panel is locked
     *
     * @param string $pwd
     * @return bool
     */
    public function isLock(string $pwd): bool
    {
        return $this->validation($pwd) && (bool) $this->getConfigFlagValue(self::FLAG);
    }

    /**
     * Validate password and set the lock status
     *
     * @param string $pwd
     * @param bool $lock
     * @return bool
     */
    private function toggleLock(string $pwd, bool $lock): bool
    {
        if ($this->validation($pwd)) {
            $this->setConfigFlagValue(self::FLAG, $lock);
            return true;
        }
        return false;
    }

    /**
     * Validate the password and module state
     *
     * @param string $pwd
     * @return bool
     */
    private function validation(string $pwd): bool
    {
        return $this->config->getModuleActive() && $this->config->comparePwd($pwd);
    }    
    /**
     * canBlockPanel
     *
     * @return bool
     */
    public function canBlockPanel(string $userId): bool{
       $active = $this->config->getModuleActive() && (bool) $this->getConfigFlagValue(self::FLAG);
       if (!in_array($userId, $this->config->getUsersException()) && $active ){
            return true;
       }
       return false;
    }
    /**
     * Save a flag value
     *
     * @param string $flagCode
     * @param mixed $value
     * @return void
     */
    private function setConfigFlagValue(string $flagCode, mixed $value): void
    {
        $this->flagManager->saveFlag($flagCode, $value);
    }

    /**
     * Get a flag value
     *
     * @param string $flagCode
     * @return mixed
     */
    private function getConfigFlagValue(string $flagCode): mixed
    {
        return $this->flagManager->getFlagData($flagCode);
    }
}
