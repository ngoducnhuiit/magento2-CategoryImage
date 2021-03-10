<?php
/**
 * 
 * @category: Magepow
 * @Copyright (c) 2014 Magepow  (<https://www.magepow.com>)
 * @authors: Magepow (<magepow<support@magepow.com>>)
 * @date:    2021-03-10 13:26:29
 * @license: <http://www.magepow.com/license-agreement>
 * @github: <https://github.com/magepow> 
 */


namespace Magepow\CategoryImage\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

  /**
    * @codeCoverageIgnore
  */
  class InstallData implements InstallDataInterface
  {
    /**
      * EAV setup factory.
      *
      * @var EavSetupFactory
    */
    private $_eavSetupFactory;
    protected $categorySetupFactory;
    
    /**
      * Init.
      *
      * @param EavSetupFactory $eavSetupFactory
    */
    public function __construct(EavSetupFactory $eavSetupFactory, \Magento\Catalog\Setup\CategorySetupFactory $categorySetupFactory)
    {
      $this->_eavSetupFactory = $eavSetupFactory;
      $this->categorySetupFactory = $categorySetupFactory;
    }
    
    /**
      * {@inheritdoc}
      *
      * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(
      ModuleDataSetupInterface $setup,
      ModuleContextInterface $context
    ) {
      /** @var EavSetup $eavSetup */
      $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);
      $setup = $this->categorySetupFactory->create(['setup' => $setup]);         
      $setup->addAttribute(
        \Magento\Catalog\Model\Category::ENTITY, 'magepow_image', [
          'type' => 'varchar',
          'label' => 'Magepow Image',
          'input' => 'image',
          'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image',
          'required' => false,
          'sort_order' => 9,
          'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
          'group' => 'General Information',
        ]
      );
    }
  }