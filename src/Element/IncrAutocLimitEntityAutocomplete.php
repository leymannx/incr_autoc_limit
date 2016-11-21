<?php

namespace Drupal\incr_autoc_limit\Element;

use Drupal\Core\Entity\Element\EntityAutocomplete;

/**
 * Provides an entity autocomplete form element.
 *
 * @FormElement("incr_autoc_limit_entity_autocomplete")
 */
class IncrAutocLimitEntityAutocomplete extends EntityAutocomplete {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $info = parent::getInfo();
    $class = get_class($this);

    $info['#selection_handler'] = 'incr_autoc_limit:node';

    $info['#element_validate'] = array(array($class, 'validateEntityAutocomplete'));
    array_unshift($info['#process'], array($class, 'processEntityAutocomplete'));

    return $info;
  }

}
