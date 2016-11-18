<?php

namespace Drupal\incr_autoc_limit\Plugin\EntityReferenceSelection;

use Drupal\Component\Utility\Html;
use Drupal\Core\Entity\Plugin\EntityReferenceSelection\DefaultSelection;

/**
 * Default plugin implementation of the Entity Reference Selection plugin.
 *
 * @EntityReferenceSelection(
 *   id = "incr_autoc_limit_default",
 *   label = @Translation("Incr. Autoc. Limit Default"),
 *   group = "custom",
 * )
 */
class IncrAutocLimitDefaultSelection extends DefaultSelection {

  /**
   * {@inheritdoc}
   */
  public function getReferenceableEntities($match = NULL, $match_operator = 'CONTAINS', $limit = 0) {
    // Increase selection limit.
    parent::getReferenceableEntities($match, $match_operator, 25);
  }

}