<?php

namespace Drupal\imd_shop;

class StarWarsApiClient {


  public function getRoot() {
    return [
      'films',
      'people',
      'planets',
    ];
  }

  public function getResourceList($resource) {
    $list = [];
    $list[] = [
      'id' => 1,
      'name' => 'Luke Skywalker',
    ];

    return $list;
  }
}