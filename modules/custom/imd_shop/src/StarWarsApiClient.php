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
}