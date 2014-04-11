<?php
/**
 * Created by PhpStorm.
 * User: Sylvain Artois
 * Date: 01/04/14
 * Time: 21:32
 */
namespace Com\Alittlemarket\DoctrineJsBridge\Command;

use Com\Alittlemarket\DoctrineJsBridge\Generator\JavascriptEntityGenerator;
use Doctrine\ORM\Tools\Console\MetadataFilter;
use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class JsBridgeGenerator
 *
 * @package Com\Alittlemarket\DoctrineJsBridge\Command
 */
class JsBridgeGenerator extends Command
{

    protected function configure()
    {
        $this
            ->setName('orm:js-bridge:generate-entities')
            ->setAliases(array('orm:js:generate'))
            ->setDescription('Generate javascript model class from your mapping information.')
            ->setDefinition(array(
                new InputArgument(
                    'dest-path', InputArgument::REQUIRED, 'The path to generate your entity classes.'
                ),
                new InputOption(
                    'filter', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                    'A string pattern used to match entities that should be processed.'
                ),
                new InputOption(
                    'regenerate-entities', null, InputOption::VALUE_OPTIONAL,
                    'Flag to define if generator should regenerate entity if it exists.', false
                ),
                new InputOption(
                    'javascript-framework',
                    'jf',
                    InputOption::VALUE_OPTIONAL,
                    'The javascript framework in use. Will be used to select the class template',
                    'backbone'
                )
            ))
            ->setHelp(<<<HELP
@todo
HELP
            );
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*
         * CODE DUPLICATION FROM Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand
         */

        $em = $this->getHelper('em')->getEntityManager();

        $cmf = new DisconnectedClassMetadataFactory();
        $cmf->setEntityManager($em);
        $metadatas = $cmf->getAllMetadata();
        $metadatas = MetadataFilter::filter($metadatas, $input->getOption('filter'));

        // Process destination directory
        $destPath = realpath($input->getArgument('dest-path'));
        $javascriptFramework = $input->getArgument('javascript-framework');
        //@todo const
        $allowedFramework = array('angularjs', 'backbone', 'backbone-relational', 'canjs', 'emberjs', 'sproutcore');

        if (! file_exists($destPath)) {
            throw new \InvalidArgumentException(
                sprintf("Javascript entitites destination directory '<info>%s</info>' does not exist.", $input->getArgument('dest-path'))
            );
        }

        if (! is_writable($destPath)) {
            throw new \InvalidArgumentException(
                sprintf("Javascript entitites destination directory '<info>%s</info>' does not have write permissions.", $destPath)
            );
        }

        if (! in_array($javascriptFramework, $allowedFramework)) {
            throw new \InvalidArgumentException(
                sprintf("Javascript framework must one of <info>%s</info>", implode(", ", $allowedFramework))
            );
        }

        if (count($metadatas)) {

            // Create EntityGenerator
            $entityGenerator = new JavascriptEntityGenerator();
            $entityGenerator->setRegenerateEntityIfExists($input->getOption('regenerate-entities'));
            $entityGenerator->setJavascriptFramework($javascriptFramework);

            foreach ($metadatas as $metadata) {

                $output->writeln(
                    sprintf('Processing entity "<info>%s</info>"', $metadata->name)
                );

                // Generating Entity
                $entityGenerator->generateOne($metadata, $destPath);
            }

            // Outputting information message
            $output->writeln(PHP_EOL . sprintf('Javascript entitites generated to "<info>%s</INFO>"', $destPath));

        } else {
            $output->writeln('No Metadata Classes to process.');
        }
    }
} 