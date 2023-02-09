<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Plugin\Trait;

/**
 * Define the plugin manager options trait.
 */
trait PluginManagerOptionsTrait {

  /**
   * Get plugin manager definitions as options.
   */
  public function getOptions(): array {
    $options = [];

    foreach ($this->getDefinitions() as $plugin_id => $definition) {
      if (!isset($definition['label'], $definition['provider'])) {
        continue;
      }

      $options[$plugin_id] = $definition['label'];
    }

    return $options;
  }
}
