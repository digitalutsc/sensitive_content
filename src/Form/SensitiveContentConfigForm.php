<?php

namespace Drupal\sensitive_content_checker\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;


/**
 * Configure sensitive content checker settings for this site.
 */
class SensitiveContentConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['sensitive_content_checker.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'sensitive_content_checker_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('sensitive_content_checker.settings');

    $form['blocked_classes'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Sensitive Words'),
      '#description' => $this->t('Enter the words to be flagged as sensitive, separated by commas.'),
      '#default_value' => $config->get('blocked_classes'),
    ];

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('Enter the title of the block.'),
      '#default_value' => $config->get('title'),
    ];

    $form['description'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Description'),
      '#description' => $this->t('Enter the description of the block.'),
      '#default_value' => $config->get('description'),
    ];

    $form['button_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Button Text'),
      '#description' => $this->t('Enter the text for the button.'),
      '#default_value' => $config->get('button_text'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('sensitive_content_checker.settings')
      ->set('blocked_classes', $form_state->getValue('blocked_classes'))
      ->save();

    $this->config('sensitive_content_checker.settings')
      ->set('title', $form_state->getValue('title'))
      ->save();

    $this->config('sensitive_content_checker.settings')
      ->set('description', $form_state->getValue('description'))
      ->save();

    $this->config('sensitive_content_checker.settings')
      ->set('button_text', $form_state->getValue('button_text'))
      ->save();
      
    parent::submitForm($form, $form_state);
  }

}