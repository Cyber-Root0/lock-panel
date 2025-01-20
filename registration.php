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
use Magento\Framework\Component\ComponentRegistrar;
use CRT0\LockPanel\Helper\Strings;
ComponentRegistrar::register(
	ComponentRegistrar::MODULE,
	Strings::MODULE_ID,
	__DIR__
);