<?php

namespace Drupal\imd_shop;

use GuzzleHttp;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class StarWarsApiClient {

  /**
   * @var \GuzzleHttp\Client
   */
  private $http_client;

  private $baseURL = 'http://swapi.co/api/';

  public function __construct(Client $http_client) {
    $this->http_client = $http_client;
  }

  public function getRoot() {
    /** @var Response $response */
    $response = $this->http_client->get($this->baseURL);
    $data = GuzzleHttp\json_decode((string) $response->getBody(), TRUE);

    return array_keys($data);
  }

  public function getResourceList($resource) {
    /** @var Response $response */
    $response = $this->http_client->get($this->baseURL . $resource . '/');
    $data = GuzzleHttp\json_decode((string) $response->getBody(), TRUE);

    $list = $data['results'];
    while ($data['next']) {
      break;
      /** @var Response $response */
      $response = $this->http_client->get($data['next']);
      $data = GuzzleHttp\json_decode((string) $response->getBody(), TRUE);
      $list = array_merge($list, $data['results']);
    }

    foreach ($list as &$resource) {
      $resource['id'] = preg_replace('/[^0-9]/', '', $resource['url']);
    }

    return $list;
  }

  public function getResourceItem($resource, $id) {
    /** @var Response $response */
    $response = $this->http_client->get($this->baseURL . $resource . '/' . $id);
    $data = GuzzleHttp\json_decode((string) $response->getBody(), TRUE);

    return $data;
  }
}