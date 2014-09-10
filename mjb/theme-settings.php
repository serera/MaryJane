<?php
/**
 * @file
 * theme-settings.php
 *
 * Provides theme settings for Bootstrap based themes when admin theme is not.
 *
 * @see theme/settings.inc
 */

/**
 * Implements hook_form_FORM_ID_alter().
 */
function mjb_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes.
  // @see https://drupal.org/node/943212
  if (isset($form_id)) {
    return;
  }
  
  // Alter theme settings form.
  _bootstrap_settings_form($form, $form_state);

  $form['advanced']['bootstrap_cdn']['bootstrap_cdn']['#default_value'] = '3.2.0';
  $form['advanced']['bootstrap_cdn']['bootstrap_cdn']['#options']['3.2.0'] = '3.2.0';

  dpm($form);
}
