<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Contract;

/**
 * Plugin manager definition options.
 */
interface PluginManagerOptionsInterface {

  /**
   * Get plugin manager definition options.
   */
  public function getOptions(): array;
}
