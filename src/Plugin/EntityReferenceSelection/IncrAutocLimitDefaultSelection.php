<?php

namespace Drupal\incr_autoc_limit\Plugin\EntityReferenceSelection;

use Drupal\node\Plugin\EntityReferenceSelection\NodeSelection;

/**
 * Entity reference selection.
 *
 * @EntityReferenceSelection(
 *   id = "incr_autoc_limit:node",
 *   label = @Translation("Incr. Autoc. Limit Node"),
 *   group = "custom",
 * )
 */
class IncrAutocLimitDefaultSelection extends NodeSelection {

  /**
   * {@inheritdoc}
   */
  public function getReferenceableEntities($match = NULL, $match_operator = 'CONTAINS', $limit = 0) {
    return parent::getReferenceableEntities($match, $match_operator, 25);
  }

}
