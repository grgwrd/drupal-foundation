<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Plugin\Trait;

use Drupal\Core\Form\FormStateInterface;

/**
 * Define the configuration plugin form trait.
 */
trait ConfigurationPluginFormTrait {

  /**
   * {@inheritDoc}
   */
  public function buildConfigurationForm(
    array $form,
    FormStateInterface $form_state
  ): array {
    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function validateConfigurationForm(
    array &$form,
    FormStateInterface $form_state
  ): void {}

  /**
   * {@inheritDoc}
   */
  public function submitConfigurationForm(
    array &$form,
    FormStateInterface $form_state
  ): void {
    if ($keys = $this->formStateCleanKeys()) {
      $form_state->setCleanValueKeys($keys);
    }
    $this->setConfiguration($form_state->cleanValues()->getValues());
  }

  /**
   * Set the keys that should be cleaned from the form state.
   *
   * @return array
   *   An array of value keys.
   */
  protected function formStateCleanKeys(): array {
    return [];
  }
}
