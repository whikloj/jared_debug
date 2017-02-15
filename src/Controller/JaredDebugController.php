<?php
namespace Drupal\jared_debug\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\devel\DevelDumperManager;

class JaredDebugController extends ControllerBase {

  public function content() {

    $context = \Drupal::service('islandora.jsonldcontextgenerator')->getContext('fedora_resource.non_rdf_source');
    dpm($context);
    //$fields = \Drupal::service('islandora.bundleresolver')->resolveBundle($context);
    //dpm($fields);
    $value = array(
      '#type' => 'markup',
      '#markup' => $this->t('Hello, World!'),
    );
    return $value;
  }

}

