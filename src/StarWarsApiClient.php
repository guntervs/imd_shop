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
    $data = $this->get();
    return array_keys($data);
  }

  public function getResourceList($resource) {
    $path = $resource . '/';
    $data = $this->get($path);

    foreach ($data as &$item) {
      $item['id'] = preg_replace('/[^0-9]/', '', $item['url']);
    }

    return $data;
  }

  public function getResourceItem($resource, $id) {
    $path = $resource . '/' . $id;
    $data = $this->get($path);

    return $data;
  }

  /**
   * @param string $path
   * @param array $results
   * @return array
   *   Response data
   */
  private function get($path = '', $results = []) {
    /** @var Response $response */
    $response = $this->http_client->get($this->baseURL . $path);
    $data = GuzzleHttp\json_decode((string) $response->getBody(), TRUE);

    if (!empty($data['results'])) {
      $results = array_merge($results, $data['results']);
    }

    if (!empty($data['next'])) {
      $path = str_replace($this->baseURL, '', $data['next']);
      $results = $this->get($path, $results);
    }

    return !empty($data['results']) ? $results : $data;
  }
}