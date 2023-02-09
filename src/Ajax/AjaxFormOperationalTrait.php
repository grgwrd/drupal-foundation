<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Ajax;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\NestedArray;

/**
 * Define the AJAX form operational trait.
 */
trait AjaxFormOperationalTrait {

  /**
   * Ajax operational submit callback.
   *
   * @param array $form
   *   An array of form element.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state instance.
   */
  public function ajaxOperationalSubmitCallback(
    array $form,
    FormStateInterface $form_state
  ): void {
    $button = $form_state->getTriggeringElement();

    if ($operation = $button['#operation']) {
      $count_keys = $operation['count_keys'] ?? [];
      $count = $form_state->get($count_keys) ?? 0;

      switch ($operation['type']) {
        case 'add':
          $count++;
          break;

        case 'remove':
          if ($reindex_keys = $operation['reindex_keys']) {
            $delta = $operation['delta'] ?? 0;

            $this->formReindexStateInputs(
              $reindex_keys,
              $delta,
              $form_state
            );
          }

          if ($count > 0) {
            $count--;
          }
          break;
      }
      $form_state->set($count_keys, $count);
    }

    $form_state->setRebuild();
  }

  /**
   * Get form operational count.
   *
   * @param $key
   *   The form state storage key.
   * @param $default
   *   The form state default value.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state instance.
   *
   * @return int
   *   The storage item count value.
   */
  protected function formOperationalCount(
    $key,
    $default,
    FormStateInterface $form_state
  ): int {
    if (!$form_state->has($key)) {
      $form_state->set($key, $default);
    }

    return $form_state->get($key) ?? 0;
  }

  /**
   * Form reindex the state inputs.
   *
   * @param $key
   *   The key value.
   * @param int $delta
   *   The value delta.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state instance.
   */
  protected function formReindexStateInputs(
    $key,
    int $delta,
    FormStateInterface $form_state
  ): void {
    if (!is_array($key)) {
      $key = [$key];
    }
    foreach (['getValues', 'getUserInput'] as $method) {
      $values = NestedArray::getValue($form_state->$method(), $key) ?? [];
      unset($values[$delta]);
      NestedArray::setValue($form_state->$method(), $key, array_values($values));
    }
  }
}
