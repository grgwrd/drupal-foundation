<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Plugin\Trait;

use Drupal\Component\Utility\NestedArray;

/**
 * Define the configurable plugin trait.
 */
trait ConfigurablePluginTrait {

  /**
   * Gets this plugin's configuration.
   *
   * @return array
   *   An array of this plugin's configuration.
   */
  public function getConfiguration(): array {
    return $this->configuration + $this->defaultConfiguration();
  }

  /**
   * Sets the configuration for this plugin instance.
   *
   * @param array $configuration
   *   An associative array containing the plugin's configuration.
   */
  public function setConfiguration(array $configuration): void {
    $this->configuration = NestedArray::mergeDeep(
      $this->getConfiguration(),
      $this->defaultConfiguration(),
      $configuration
    );
  }
}
