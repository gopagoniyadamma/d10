namespace Drupal\my_module\Plugin\QueueWorker;

/**
 * A Node Publisher that publishes nodes on CRON run.
 *
 * @QueueWorker(
 *   id = "queue_node_cron_publish",
 *   title = @Translation("Cron Node Publisher"),
 *   cron = {"time" = 60}
 * )
 */
class CronNodePublisher extends NodePublishBase {}
