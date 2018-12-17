<?php

/*
The MIT License (MIT)

Copyright (c) 2018 Jacques Archimède

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is furnished
to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

namespace App\G6K\Command;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Exception\LogicException;

/**
Base class for all command of the g6k:view namespace.
 */
abstract class ViewCommandBase extends CommandBase
{

	/**
	 * @inheritdoc
	 */
	public function __construct(string $projectDir, $name = "View Manager") {
		parent::__construct($projectDir, $name);
	}

	/**
	 * @inheritdoc
	 */
	protected function getCommandName() {
		throw new LogicException("getCommandName method is not implemented");
	}

	/**
	 * @inheritdoc
	 */
	protected function getCommandDescription() {
		throw new LogicException("getCommandDescription method is not implemented");
	}

	/**
	 * @inheritdoc
	 */
	protected function getCommandHelp() {
		throw new LogicException("getCommandHelp method is not implemented");
	}

	/**
	 * @inheritdoc
	 */
	protected function getCommandArguments() {
		throw new LogicException("getCommandArguments method is not implemented");
	}

	/**
	 * @inheritdoc
	 */
	protected function getCommandOptions() {
		throw new LogicException("getCommandOptions method is not implemented");
	}

	/**
	 * Updates (or Creates) the manifest.json file for the assets versioning.
	 *
	 * @param   \Symfony\Component\Console\Output\OutputInterface $output The output interface
	 * @return void
	 *
	 */
	protected function refreshAssetsManifest(OutputInterface $output) {
		$command = $this->getApplication()->find('g6k:assets:manifest:refresh');
		$input = new ArrayInput(array(
			'command' => 'g6k:assets:manifest:refresh',
			'--no-interaction' => true
		));
		$output->writeln("");
		$this->info($output, "Refreshing the assets manifest");
		$returnCode = $command->run($input, $output);
		if ($returnCode == 0) {
			$this->info($output, "Refreshing manifest done!");
		} else {
			$this->error($output, "Refreshing manifest not done!");
		}
	}

	/**
	 * Migrates the templates written for Symfony 2 or 3.
	 *
	 * @param   string $view The view name
	 * @param   \Symfony\Component\Console\Output\OutputInterface $output The output interface
	 * @return void
	 *
	 */
	protected function migrate3To4($view, OutputInterface $output) {
		$command = $this->getApplication()->find('g6k:templates:migrate');
		$input = new ArrayInput(array(
			'command' => 'g6k:templates:migrate',
			'viewname' => $view,
			'--no-interaction' => true
		));
		$output->writeln("");
		$this->info($output, "migration of the templates");
		$returnCode = $command->run($input, $output);
		if ($returnCode == 0) {
			$this->info($output, "Migration of the templates is done!");
		} else {
			$this->error($output, "Migration of the templates is not done!");
		}
	}

}
