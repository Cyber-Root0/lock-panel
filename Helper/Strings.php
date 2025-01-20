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
namespace CRT0\LockPanel\Helper;
class Strings
{
    // Config
    public const CONFIGID_EN = 'enable';
    public const CONFIGID_EXC = 'exception';
    public const CONFIGID_PWD = 'password';
    public const MODULE_ID = 'CRT0_LockPanel';

    // Labels
    public const LABEL_ERRORID = 'messageerror';
    
    public const LABEL_ERRORMSG = 'An error occurred while logging in, contact support';
    public const LABEL_USERID = 'username';

    // Miscellaneous
    public const ADMIN_LOCK_FLAG = 'crt0lockpanel';

    //RESPONSE
    public const RESPONSE_LOCK_IS = 'Painel Administrativo bloqueado';
    public const RESPONSE_LOCK_ISNOT = 'Painel Administrativo não bloqueado';
    public const RESPONSE_LOCK = 'Painel administrativo bloqueado com sucesso';
    public const RESPONSE_NOTLOCK = 'Erro ao bloquear o painel administrativo';
    public const RESPONSE_UNLOCK = 'Painel administrativo desbloqueado com sucesso';
    public const RESPONSE_NOTUNLOCK = 'Erro ao desbloquear o painel administrativo';
}
