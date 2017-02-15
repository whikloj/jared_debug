<?php
/**
 * Created by PhpStorm.
 * User: whikloj
 * Date: 2017-02-07
 * Time: 2:06 PM
 */

namespace Drupal\jared_debug\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\islandora\RdfBundleSolver\JsonldContextGeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class JaredJsonLdController extends ControllerBase {

  public $jsonld_generator;

  public function __construct(JsonldContextGeneratorInterface $generator) {
    $this->jsonld_generator = $generator;

  }

  public static function create(ContainerInterface $container) {
    return new static($container->get('islandora.jsonldcontextgenerator'));
  }

  public function content() {
    $value = array(
      '#type' => 'markup',
      '#prefix' => '<pre>',
      '#suffix' => '</pre>',
      '#markup' => $this->jsonld_generator->getContext('fedora_resource.collection'),
    );
    return $value;
  }

}