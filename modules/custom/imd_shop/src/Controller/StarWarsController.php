<?php

namespace Drupal\imd_shop\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Routing\RouteProviderInterface;
use Drupal\imd_shop\StarWarsApiClient;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Star Wars Controller
 */
class StarWarsController extends ControllerBase {

  /**
   * Star Wars API Client
   *
   * @var \Drupal\imd_shop\StarWarsApiClient
   */
  protected $client;


  /**
   * RouterInfoController constructor.
   *
   * @param \Drupal\Core\Routing\RouteProviderInterface $provider
   *   The route provider.
   */
  public function __construct(StarWarsApiClient $sw_client) {
    $this->client = $sw_client;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('imd.starwars.client')
    );
  }

  /**
   * Builds the start page for the API.
   *
   * @return array
   *   A render array as expected by the renderer.
   */
  public function root() {
    $root = $this->client->getRoot();

    $output = [
      '#theme' => 'sw_root',
      '#resources' => $root,
    ];

    return $output;
  }

  /**
   * Builds the start page for the API.
   *
   * @return array
   *   A render array as expected by the renderer.
   */
  public function resourceList($resource = NULL) {
    $output = [
      '#markup' => 'Resource: ' . $resource,
    ];
    return $output;
  }

  /**
   * Builds the start page for the API.
   *
   * @return array
   *   A render array as expected by the renderer.
   */
  public function resourceItem($resource = NULL, $id = NULL) {
    $output = [
      '#markup' => 'Resource: ' . $resource . ' - ID: ' . $id,
    ];
    return $output;
  }


}
