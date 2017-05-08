<?php

namespace Drupal\imd_shop\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class DiscountConfigForm extends ConfigFormBase {
  use \Drupal\Core\StringTranslation\StringTranslationTrait;
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'imd_shop.discount.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'imd_shop_discount_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state){
    $settings = $this->config('imd_shop.discount.settings');
    $form['active'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Discounts active'),
      '#return_value' => 1,
      '#default_value' => $settings->get('active'),
    ];

    $form['minimum'] = [
      '#type' => 'number',
      '#title' => $this->t('Minimum amount'),
      '#min' => 0,
      '#default_value' => $settings->get('minimum'),
    ];

    $form['discount'] = [
      '#type' => 'number',
      '#title' => $this->t('Discount percentage'),
      '#min' => 0,
      '#max' => 100,
      '#default_value' => $settings->get('discount'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('imd_shop.discount.settings')
      ->set('active', $values['active'])
      ->set('minimum', $values['minimum'])
      ->set('discount', $values['discount'])
      ->save();

    parent::submitForm($form, $form_state);
  }
}