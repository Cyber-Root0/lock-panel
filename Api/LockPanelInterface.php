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
namespace CRT0\LockPanel\Api;
interface LockPanelInterface{    
    /**
     * getStatus
     *
     * @return string
     */
    public function getStatus() : string;    
    /**
     * lockPanel
     *
     * @return string
     */
    public function lockPanel() : string;    
    /**
     * unlockPanel
     *
     * @return string
     */
    public function unlockPanel() : string;
}