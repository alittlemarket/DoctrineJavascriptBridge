<?php
/**
 * Created by PhpStorm.
 * User: Sylvain Artois
 * Date: 01/04/14
 * Time: 12:31
 */
namespace Com\Alittlemarket\DoctrineJsBridge\TestEntity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Product
 *
 * @package Com\Alittlemarket\DoctrineJsBridge\TestEntity
 * @Entity
 */
class User
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
     * @var string
     *
     * @Column(length=255)
     */
    private $password;

    /**
     * @var Cart
     *
     * @OneToOne(targetEntity="Cart", mappedBy="user")
     */
    private $cart;

    /**
     * @var
     *
     * @OneToMany(targetEntity="Address", mappedBy="user")
     */
    private $addresses;

    /** Init collection */
    public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }
}
