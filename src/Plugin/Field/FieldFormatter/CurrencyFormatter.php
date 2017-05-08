<?php

namespace Drupal\imd_shop\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Plugin implementation of the 'currency' formatter.
 *
 * @FieldFormatter(
 *   id = "imd_shop_currency",
 *   label = @Translation("Currency"),
 *   field_types = {
 *     "integer",
 *     "decimal",
 *     "float"
 *   }
 * )
 */
class CurrencyFormatter extends FormatterBase {
  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#markup' => $this->t('€ :price', [
          ':price' => $item->value,
        ]),
      ];
    }

    return $elements;
  }

}
