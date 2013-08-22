<?php

namespace Sirian\NodeJSBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class NodeBridgeCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this
            ->setName('node:bridge')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var ParameterBag $bag
         */
        $bag = $this->getContainer()->get('sirian_node_js.parameter_bag');
        $data = json_encode($bag->all(), JSON_UNESCAPED_UNICODE);
        $output->writeln($data, OutputInterface::OUTPUT_RAW);
    }
}
