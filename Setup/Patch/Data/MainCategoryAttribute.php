<?php
/**
 * Copyright (C) 2024 Pixel Développement
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PixelOpen\ProductMainCategory\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class MainCategoryAttribute implements DataPatchInterface
{
    protected EavSetupFactory $eavSetupFactory;

    protected ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            'main_category',
            [
                'type' => 'varchar',
                'label' => 'Main Category',
                'input' => 'text',
                'backend' => 'PixelOpen\ProductMainCategory\Model\Entity\Attribute\MainCategory',
                'default' => null,
                'required' => false,
                'user_defined' => false,
                'searchable' => false,
                'visible_in_advanced_search' => false,
                'filterable' => false,
                'filterable_in_search' => false,
                'used_for_promo_rules' => false,
                'is_html_allowed_on_front' => false,
                'used_in_product_listing' => true,
                'visible_on_front' => false,
                'used_for_sort_by' => false,
                'global' => ScopedAttributeInterface::SCOPE_WEBSITE,
                'note' => 'Only one category is allowed.'
            ]
        );
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }
}
