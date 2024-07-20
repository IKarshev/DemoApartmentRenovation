<?php

namespace Bitrix\Main\Data\Configurator;

use Bitrix\Main\Application;
use Bitrix\Main\NotSupportedException;

class MemcachedConnectionConfigurator
{
	/** @var array */
	protected $config;
	/** @var array */
	protected $servers = [];

	public function __construct($config)
	{
		if (!extension_loaded('memcached'))
		{
			throw new NotSupportedException('memcached extension is not loaded.');
		}

		$this->config = $config;

		$this->addServers($this->getConfig());
	}

	protected function addServers($config)
	{
		$servers = $config['servers'] ?? [];

		if (isset($config['host'], $config['port']))
		{
			array_unshift($servers, [
				'host' => $config['host'],
				'port' => $config['port'],
			]);
		}

		foreach ($servers as $server)
		{
			if (!isset($server['weight']) || $server['weight'] <= 0)
			{
				$server['weight'] = 1;
			}

			$this->servers[] = [
				$server['host'] ?? 'localhost',
				$server['port'] ?? '11211',
				$server['weight']
			];
		}

		return $this;
	}

	public function getConfig()
	{
		return $this->config;
	}

	public function createConnection()
	{
		if (!$this->servers)
		{
			throw new NotSupportedException('Empty server list to memcache connection.');
		}

		$connectionTimeout = $this->getConfig()['connectionTimeout'] ?? 1;
		$serializer = $this->getConfig()['serializer'] ?? \Memcached::SERIALIZER_PHP;

		$connection = new \Memcached();
		$connection->setOption(Memcached::OPT_CONNECT_TIMEOUT, $connectionTimeout);
		$connection->setOption(Memcached::OPT_SERIALIZER, $serializer);

		$result = $connection->addServer($this->servers);

		if (!$result)
		{
			$error = error_get_last();
			if (isset($error['type']) && $error['type'] === E_WARNING)
			{
				$exception = new \ErrorException($error['message'], 0, $error['type'], $error['file'], $error['line']);
				$application = Application::getInstance();
				$exceptionHandler = $application->getExceptionHandler();
				$exceptionHandler->writeToLog($exception);
			}
		}

		return $result? $connection : null;
	}
}