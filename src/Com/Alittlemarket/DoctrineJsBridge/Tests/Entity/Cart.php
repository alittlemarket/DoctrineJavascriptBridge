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
class Cart
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
     * @var \DateTime
     *
     * @Column(type="datetimetz")
     */
    private $updatedAt;

    /**
     * @var User
     *
     * @OneToOne(targetEntity="User", inversedBy="cart")
     */
    private $user;

    /**
     * @var ArrayCollection
     *
     * @ManyToMany(targetEntity="Product")
     * @JoinTable(name="cart_has_product")
     */
    private $products;

    /** Init collection */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
} 