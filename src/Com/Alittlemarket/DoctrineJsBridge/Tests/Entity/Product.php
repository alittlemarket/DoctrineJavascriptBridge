<?php
/**
 * Created by PhpStorm.
 * User: Sylvain Artois
 * Date: 01/04/14
 * Time: 12:32
 */
namespace Com\Alittlemarket\DoctrineJsBridge\TestEntity;

/**
 * Class Product
 *
 * @package Com\Alittlemarket\DoctrineJsBridge\TestEntity
 * @Entity
 */
class Product
{
    /**
     * @var int
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var string
     *
     * @Column(length=50)
     */
    private $name;

    /**
     * @var float
     *
     * @Column(type="decimal")
     */
    private $price;
} 