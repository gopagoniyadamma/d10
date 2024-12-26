<?php

namespace Drupal\my_module\Plugin\QueueWorker;

/**
 * A Node Publisher that pgublishes nodes via a manual action triggered by an admin.
 *
 * @QueueWorker(
 *   id = "manual_node_publisher",
 *   title = @Translation("Manual Node Publisher"),
 * )
 */

class ManualNodePublisher extends NodePublishBase {}
