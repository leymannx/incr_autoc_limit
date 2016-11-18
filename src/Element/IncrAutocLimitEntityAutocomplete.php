<?php

namespace Drupal\incr_autoc_limit\Element;

use Drupal\Component\Utility\Crypt;
use Drupal\Component\Utility\Tags;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityReferenceSelection\SelectionInterface;
use Drupal\Core\Entity\EntityReferenceSelection\SelectionWithAutocreateInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\Element\EntityAutocomplete;
use Drupal\Core\Render\Element\Textfield;
use Drupal\Core\Site\Settings;

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

    $info['#target_type'] = NULL;
    // I thought changing '#selection_handler' to my ERS plugin would work. It doesn't.
    // $info['#selection_handler'] = 'incr_autoc_limit_default';
    $info['#selection_handler'] = 'default';
    $info['#selection_settings'] = array();
    $info['#tags'] = FALSE;
    $info['#autocreate'] = NULL;
    $info['#validate_reference'] = TRUE;
    $info['#process_default_value'] = TRUE;

    $info['#element_validate'] = array(array($class, 'validateEntityAutocomplete'));
    array_unshift($info['#process'], array($class, 'processEntityAutocomplete'));

    return $info;
  }

}
