<?php namespace Trainer\Calendar;

use Illuminate\Config;

class CalendarServiceProvider extends \Illuminate\Support\ServiceProvider
{
	public function boot()
	{
		$this->_loadRoutes();
		$this->_loadConfig();

	}

	public function register()
	{
	}

	/**
	 * Load the routes for each module
	 * @param string $module
	 */
	private function _loadRoutes()
	{
		if(file_exists(__DIR__.'/routes.php')) {
			include __DIR__ . '/routes.php';
		}
	}

	/**
	 * Load config files in each modules.
	 * config files are merged recursively with the app config.
	 *** Be careful what you name your config files. It might overwrite other services' values
	 * e.g.: Config::get({module_name}.key)
	 * @param string $module
	 */
	private function _loadConfig()
	{
		if(is_dir(__DIR__.'/config')) {
			$config_files = glob(__DIR__.'/config/*.php');
			$this->publishes($config_files, 'trainers');
			foreach($config_files as $config_file) {
				$fileName = basename($config_file, '.php');
				Config::set($fileName, array_merge_recursive(
					include $config_file, Config::get($fileName, [])
				));
			}
		}
	}
}