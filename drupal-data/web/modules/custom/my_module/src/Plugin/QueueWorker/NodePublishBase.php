<?php


/**
 * @file
 * Contains Drupal\my_module\Plugin\QueueWorker\NodePublishBase.php
 */

namespace Drupal\my_module\Plugin\QueueWorker;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Provides base functionality for the NodePublish Queue Workers.
 */
abstract class NodePublishBase extends QueueWorkerBase implements ContainerFactoryPluginInterface
{

    /**
     * The node storage.
     *
     * @var \Drupal\Core\Entity\EntityStorageInterface
     */
    protected $nodeStorage;

    /**
     * Creates a new NodePublishBase object.
     *
     * @param \Drupal\Core\Entity\EntityStorageInterface $node_storage
     *   The node storage.
     */
    public function __construct(EntityStorageInterface $node_storage)
    {
        $this->nodeStorage = $node_storage;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
    {
        return new static(
            $container->get('entity_type.manager')->getStorage('node')
        );
    }

    /**
     * Publishes a node.
     *
     * @param  NodeInterface $node
     * @return int
     */
    protected function publishNode($node)
    {
        $node->setPublished(true);
        return $node->save();
    }

    /**
     * {@inheritdoc}
     */
    public function processItem($data)
    {
        /**
   * @var NodeInterface $node 
*/
        $node = $this->nodeStorage->load($data->nid);
        if (!$node->isPublished() && $node instanceof NodeInterface) {
            $message = " Node published with Cron .". $data->nid;
            \Drupal::logger('my_module')->notice($message);

            return $this->publishNode($node);
        }
    }
}
