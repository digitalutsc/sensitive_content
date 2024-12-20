<?php

namespace Drupal\sensitive_content_checker\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\DependencyInjection\ContainerInterface;
use Drupal\sensitive_content_checker\SensitiveContentCheckerSettings;

/**
 * Provides a block for sensitive content.
 *
 * @Block(
 *   id = "sensitive_content_block",
 *   admin_label = @Translation("Sensitive Content Block")
 * )
 */
class SensitiveContentBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Get the blocked classes from configuration.
    $configuration = \Drupal::config('sensitive_content_checker.settings');

    $blocked_classes = $configuration->get('blocked_classes');
    $title = $configuration->get('title');
    $description = $configuration->get('description');
    $button_text = $configuration->get('button_text');

    if (empty($blocked_classes)) {
      $blocked_classes = ''; // or provide a default value
    }

    if (empty($title)) {
      $title = 'Sensitive Content Block';
    }

    if (empty($description)) {
      $description = 'This block will check for sensitive content.';
    }

    if (empty($button_text)) {
      $button_text = 'Check Content';
    }

    // Return the block with necessary JS and CSS attached.
    return [
      '#markup' => '<div id="sensitive-content-parent"></div>',
      '#attached' => [
        'library' => [
          'sensitive_content_checker/sensitive_content_styles',
          'sensitive_content_checker/sensitive_content_checker',
        ],
        'drupalSettings' => [
          'sensitive_content_checker' => [
            'blockedClasses' => $blocked_classes,
            'title'=> $title,
            'description'=> $description,
            'buttonText'=> $button_text,
          ],
        ],
      ],
    ];
  }
}
