<?php
/**
 * Created by PhpStorm.
 * User: Sylvain Artois
 * Date: 01/04/14
 * Time: 21:57
 */
namespace Com\Alittlemarket\DoctrineJsBridge\Generator;

use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Tools\EntityGenerator;

/**
 * Class JavascriptEntityGenerator
 *
 * @package Com\Alittlemarket\DoctrineJsBridge\Generator
 */
class JavascriptEntityGenerator extends EntityGenerator
{
    /** @var string */
    protected $javascriptFramework;

    /**
     * @param string $javascriptFramework
     */
    public function setJavascriptFramework($javascriptFramework)
    {
        $this->javascriptFramework = $javascriptFramework;
    }

    /**
     * @return string
     */
    public function getJavascriptFramework()
    {
        return $this->javascriptFramework;
    }

    /**
     * @param ClassMetadataInfo $metadata
     * @param string $destPath
     * @throws \Exception
     */
    public function generateOne(ClassMetadataInfo $metadata, $destPath)
    {
        throw new \Exception("NotYetImplementedException");
    }
}
