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
class Strings
{
    // Labels
    public const LABEL_ERRORID = 'messageerror';
    
    public const LABEL_ERRORMSG = 'An error occurred while logging in, contact support';
    public const LABEL_USERID = 'username';

    // Miscellaneous
    public const ADMIN_LOCK_FLAG = 'crt0lockpanel';

    //RESPONSE
    public const RESPONSE_LOCK_IS = 'Administrative Panel locked';
    public const RESPONSE_LOCK_ISNOT = 'Painel Administrativo não bloqueado';
    public const RESPONSE_LOCK = 'Administrative Panel not locked';
    public const RESPONSE_NOTLOCK = 'Error locking the admin panel';
    public const RESPONSE_UNLOCK = 'Admin panel successfully unlocked';
    public const RESPONSE_NOTUNLOCK = 'Error unlocking the admin panel';
}
