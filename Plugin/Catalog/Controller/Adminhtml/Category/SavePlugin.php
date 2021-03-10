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


namespace Magepow\CategoryImage\Plugin\Catalog\Controller\Adminhtml\Category;

use Magento\Catalog\Controller\Adminhtml\Category\Save as SaveController;

class SavePlugin
{
    /**
     * Add additional images
     *
     * @param SaveController $subject
     * @param array $data
     * @return array
     */
    public function beforeImagePreprocessing(SaveController $subject, $data)
    {
      foreach ($this->getAdditionalImages() as $imageType) {
        if (empty($data[$imageType])) {
          unset($data[$imageType]);
          $data[$imageType]['delete'] = true;
        }
      }

      return [$data];
    }

    /**
     * Get additional Images
     *
     * @return array
     */
    protected function getAdditionalImages() {
      return ['magepow_image'];
    }
  }