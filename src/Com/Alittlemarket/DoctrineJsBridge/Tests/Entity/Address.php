<?php
/**
 * Created by PhpStorm.
 * User: Sylvain Artois
 * Date: 01/04/14
 * Time: 12:32
 */
namespace Com\Alittlemarket\DoctrineJsBridge\TestEntity;

/**
 * Class Address
 *
 * @package Com\Alittlemarket\DoctrineJsBridge\TestEntity
 * @Entity
 */
class Address
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
     * @Column(length=5)
     */
    private $zipcod;

    /**
     * @var string
     *
     * @Column(length=50)
     */
    private $city;

    /**
     * @var string
     *
     * @Column(length=75)
     */
    private $street;

    /**
     * @var string
     *
     * @Column(length=10)
     */
    private $number;

    /**
     * @var User
     *
     * @ManyToOne(targetEntity="Product", inversedBy="addresses")
     */
    private $user;
}