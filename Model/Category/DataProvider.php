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


namespace Magepow\CategoryImage\Model\Category;

class DataProvider extends \Magento\Catalog\Model\Category\DataProvider
{
  protected function getFieldsMap()
  {
    $fields = parent::getFieldsMap();
      $fields['content'][] = 'magepow_image'; // Magepow Image field
     
      return $fields; 
    }
  }