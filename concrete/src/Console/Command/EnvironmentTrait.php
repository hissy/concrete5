<?php
namespace Concrete\Core\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;

trait EnvironmentTrait
{
    /**
     * @return Command;
     */
    public function addEnvironmentOption()
    {
        $this->addOption('env', null, InputOption::VALUE_REQUIRED, 'The environment (if not specified, we\'ll work with the default environment)');
        return $this;
    }
}