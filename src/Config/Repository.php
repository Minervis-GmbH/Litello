<?php

namespace minervis\Litello\Config;

use minervis\Litello\Config\Form\FormBuilder;
use minervis\Litello\Utils\LitelloTrait;
use ilLitelloPlugin;
use srag\ActiveRecordConfig\Litello\Config\AbstractFactory;
use srag\ActiveRecordConfig\Litello\Config\AbstractRepository;
use srag\ActiveRecordConfig\Litello\Config\Config;

/**
 * Class Repository
 *
 *
 * @package minervis\Litello\Config
 *
 * @author Minervis GmbH <jephte.abijuru@minervis.com>
 */
final class Repository extends AbstractRepository
{

    use LitelloTrait;

    const PLUGIN_CLASS_NAME = ilLitelloPlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Repository constructor
     */
    protected function __construct()
    {
        parent::__construct();
    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @inheritDoc
     *
     * @return Factory
     */
    public function factory() : AbstractFactory
    {
        return Factory::getInstance();
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        return [
            FormBuilder::KEY_CUSTOMER => Config::TYPE_STRING,
            FormBuilder::KEY_ACCESS_KEY => Config::TYPE_STRING,
            FormBuilder::KEY_SECRET_KEY =>Config::TYPE_STRING,
            FormBuilder::KEY_PROXY_HOST => Config::TYPE_STRING,
            FormBuilder::KEY_PROXY_PORT => Config::TYPE_INTEGER,
            FormBuilder::KEY_WEBREADER  => Config::TYPE_STRING
        ];
    }


    /**
     * @inheritDoc
     */
    protected function getTableName() : string
    {
        return ilLitelloPlugin::PLUGIN_ID . "_config";
    }
}
