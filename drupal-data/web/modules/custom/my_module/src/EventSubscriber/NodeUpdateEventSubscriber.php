<?php

namespace Drupal\my_module\EventSubscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;



class NodeUpdateEventSubscriber implements EventSubscriberInterface {

  /**
  * {@inheritdoc}
  */
  public static function getSubscribedEvents() {
    // Specify the event(s) to subscribe to and the method to call when the event occurs.
    $events = [
      'node.insert' => 'onNodeInsert',
    ];
    return $events;
  }

  /**
  * React to a node insert event.
  */
  public function onNodeInsert(Event $event) {
    // Your logic here.
      dump("aaaaaaaaa");
      exit;
    \Drupal::logger('my_module')->notice('Node inserted!');
  }


}
