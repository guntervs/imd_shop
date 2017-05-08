<?php

namespace Drupal\imd_shop\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Config\ConfigManager;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a block for switching users.
 *
 * @Block(
 *   id = "imd_shop_discount_block",
 *   admin_label = @Translation("Available discounts"),
 *   category = @Translation("IMD Shop")
 * )
 */
class DiscountBlock extends BlockBase{

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];


      $build['discount_information'] = [
        '#markup' => 'Discount block',
      ];


    return $build;
  }
}
