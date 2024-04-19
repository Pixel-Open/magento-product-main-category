<?php
/**
 * Copyright (C) 2024 Pixel Développement
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PixelOpen\ProductMainCategory\Model\Entity\Attribute;

use Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend;

class MainCategory extends ArrayBackend
{
    public function beforeSave($object): MainCategory
    {
        parent::beforeSave($object);

        $mainCategory = explode(',', $object->getMainCategory() ?? '');
        if (count($mainCategory) > 1) {
            $object->setMainCategory($mainCategory[0]);
        }

        return $this;
    }

    public function afterLoad($object): MainCategory
    {
        $object->setMainCategory(explode(',', $object->getMainCategory() ?? ''));

        return $this;
    }
}
