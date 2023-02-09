<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Plugin;

use Drupal\Core\Plugin\PluginBase;
use DrupalFoundation\DrupalFoundation\Contract\ConfigurablePluginInterface;
use DrupalFoundation\DrupalFoundation\Plugin\Trait\ConfigurablePluginTrait;
use DrupalFoundation\DrupalFoundation\Plugin\Trait\ConfigurationPluginFormTrait;

/**
 * Define the configurable plugin base.
 */
abstract class ConfigurablePluginBase extends PluginBase implements ConfigurablePluginInterface {

  use ConfigurablePluginTrait;
  use ConfigurationPluginFormTrait;

  /**
   * Gets default configuration for this plugin.
   *
   * @return array
   *   An associative array with the default configuration.
   */
  public function defaultConfiguration(): array {
    return [];
  }
}
