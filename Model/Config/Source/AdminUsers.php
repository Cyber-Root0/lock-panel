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
namespace CRT0\LockPanel\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
use Magento\User\Model\ResourceModel\User\CollectionFactory;
class AdminUsers implements ArrayInterface
{
    public function __construct(
        protected CollectionFactory $collectionFactory
    ) {
    }
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getAll();
    }    
    /**
     * get all admin users
     *
     * @return array
     */
    private function getAll(): array
    {
        $adminUsers = [];
        foreach ($this->collectionFactory->create() as $user) {
            $adminUsers[] = [
                'value' => $user->getUsername(),
                'label' => $user->getName()
            ];
        }
        return $adminUsers;
    }
}
