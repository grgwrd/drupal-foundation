<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Contract;

use Drupal\Core\Plugin\PluginFormInterface;
use Drupal\Component\Plugin\ConfigurableInterface;

/**
 * Define the configurable plugin interface.
 */
interface ConfigurablePluginInterface extends PluginFormInterface, ConfigurableInterface {}
