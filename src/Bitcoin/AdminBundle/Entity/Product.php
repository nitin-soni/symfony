<?php

namespace Bitcoin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bitcoin\AdminBundle\Entity\Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="fk_product_cat", columns={"fk_product_cat"})})
 * @ORM\Entity(repositoryClass="Bitcoin\AdminBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_title", type="string", length=250, nullable=false)
     * @Assert\NotBlank(message = "Please enter valid product title.")
     */
    private $productTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     * @Assert\NotBlank
     * Assert\Type(type="float", message="The value should have decimal points.") 
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_date", type="datetime", nullable=false)
     */
    private $modifiedDate;

    /**
     * @var \Bitcoin\AdminBundle\Entity\ProductCategory
     *
     * @ORM\ManyToOne(targetEntity="Bitcoin\AdminBundle\Entity\ProductCategory", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_product_cat", referencedColumnName="id",  onDelete="CASCADE")
     * })
     * @Assert\NotBlank(message = "Please Select Product Category.")
     */
    private $fkProductCat;

    /**
     * Set productTitle
     *
     * @param string $productTitle
     * @return Product
     */
    public function setProductTitle($productTitle)
    {
        $this->productTitle = $productTitle;

        return $this;
    }

    /**
     * Get productTitle
     *
     * @return string 
     */
    public function getProductTitle()
    {
        return $this->productTitle;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Product
     */
    public function setCreatedDate()
    {
        $this->createdDate = new \DateTime();

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set modifiedDate
     *
     * @param \DateTime $modifiedDate
     * @return Product
     */
    public function setModifiedDate()
    {
        $this->modifiedDate = new \DateTime();

        return $this;
    }

    /**
     * Get modifiedDate
     *
     * @return \DateTime 
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * Set fkProductCat
     *
     * @param \Bitcoin\AdminBundle\Entity\ProductCategory $fkProductCat
     * @return Product
     */
    public function setFkProductCat(\Bitcoin\AdminBundle\Entity\ProductCategory $fkProductCat = null)
    {
        $this->fkProductCat = $fkProductCat;

        return $this;
    }

    /**
     * Get fkProductCat
     *
     * @return \Bitcoin\AdminBundle\Entity\ProductCategory 
     */
    public function getFkProductCat()
    {
        return $this->fkProductCat;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
