<?php

namespace Drupal\imd_shop\Plugin\DsField;

use Drupal\ds\Plugin\DsField\DsFieldBase;

/**
 * Plugin that renders the price.
 *
 * @DsField(
 *   id = "discount_price",
 *   title = @Translation("Discount price"),
 *   entity_type = "node",
 *   provider = "node"
 * )
 */
class DiscountPrice extends DsFieldBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    /* @var $node \Drupal\node\NodeInterface */
    $node = $this->entity();

    $price = $node->get('field_product_price');

    $build[] = [
      '#markup' => $this->t('€ :price', [
        ':price' => $price->getString(),
      ]),
    ];

    return $build;


  }

}