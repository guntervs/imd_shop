<?php

namespace Drupal\imd_shop\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Config\ConfigManager;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a shopping cart block
 *
 * @Block(
 *   id = "imd_shop_cart_block",
 *   admin_label = @Translation("Shopping cart"),
 *   category = @Translation("IMD Shop")
 * )
 */
class CartBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['cart'] = [
      '#theme' => 'shopping_cart',
      '#products' => $this->getCartProducts(),
    ];

    return $build;
  }

  /**
   * Get products in the active cart.
   */
  private function getCartProducts() {
    $cart = [];

    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->condition('type', 'product');
    $query->range(0, 5);
    $entity_ids = $query->execute();

    /** @var Node[] $nodes */
    $nodes = Node::loadMultiple($entity_ids);
    foreach ($nodes as $nid => $node) {
      $quantity = rand(1, 5);

      $cart[$nid] = [
        'qty' => $quantity,
        'label' => $node->label(),
        'price' => $node->get('field_product_price')->getValue(),
      ];
    }

    return $cart;
  }
}

