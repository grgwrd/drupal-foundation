<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Ajax;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\NestedArray;

/**
 * Define the AJAX form state trait.
 */
trait AjaxFormStateTrait {

  /**
   * AJAX form JS callback by button depth.
   *
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array
   *   An array of the form elements.
   */
  public function ajaxFormCallback(
    array $form,
    FormStateInterface $form_state
  ): array {
    $button = $form_state->getTriggeringElement();
    $depth = $button['#depth'] ?? 1;

    return NestedArray::getValue(
      $form,
      array_splice($button['#array_parents'], 0, (int) "-{$depth}")
    );
  }

  /**
   * Get the form state value.
   *
   * @param $key
   *   The value key.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state instance.
   * @param null $default
   *   The default value.
   *
   * @return mixed
   *   The value for the property.
   */
  protected function getFormStateValue(
    $key,
    FormStateInterface $form_state,
    $default = NULL
  ): mixed {
    $key = !is_array($key) ? [$key] : $key;

    $inputs = [
      $form_state->getValues(),
      $form_state->getUserInput()
    ];

    foreach ($inputs as $input) {
      $key_exist = FALSE;
      $value = NestedArray::getValue($input, $key, $key_exist);

      if ($key_exist) {
        return $value;
      }
    }

    return $default;
  }
}
