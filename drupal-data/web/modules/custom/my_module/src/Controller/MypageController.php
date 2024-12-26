<?php

namespace Drupal\my_module\Controller;

use \Drupal\Core\Controller\ControllerBase;

/*
 *  MyPage Controller
*/

class MypageController extends ControllerBase {

  public function content() {
    $queue = \Drupal::queue('queue_node_cron_publish');
    $items = $queue->numberOfItems();

    $build = [
      '#markup' => $this->t('No of Item in Queue : ' . $items),
      '#cache' => ['max-age' => 0,],  
    ];
    return $build;
  }

    
}
