<?php

namespace Drupal\incr_autoc_limit\Plugin\Field\FieldWidget;

use Drupal\nep_autocomplete\Plugin\Entity\Element\NepEntityAutocomplete;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\link\Plugin\Field\FieldWidget\LinkWidget;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\link\LinkItemInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Plugin implementation of the 'link' widget.
 *
 * @FieldWidget(
 *   id = "incr_autoc_limit_link_default",
 *   label = @Translation("Incr. Autoc. Limit Link"),
 *   field_types = {
 *     "link"
 *   }
 * )
 */
class IncrAutocLimitLinkWidget extends LinkWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);

    // If the field is configured to support internal links, it cannot use the
    // 'url' form element and we have to do the validation ourselves.
    if ($this->supportsInternalLinks()) {
      $element['uri']['#type'] = 'incr_autoc_limit_entity_autocomplete';

    }

    return $element;
  }

}
