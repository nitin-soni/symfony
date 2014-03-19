<?php

namespace Bitcoin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
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
     * @var float
     *
     * @ORM\Column(name="price_listed", type="float", precision=10, scale=0, nullable=false)
     * @Assert\NotBlank
     * Assert\Type(type="float", message="The value should have decimal points.") 
     */
    private $priceListed;
    
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
     * @var boolean
     *
     * @ORM\Column(name="featured", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $featured;
    
    /**
     * @var \Bitcoin\AdminBundle\Entity\ProductCategory
     *
     * @ORM\ManyToOne(targetEntity="Bitcoin\AdminBundle\Entity\ProductCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_product_cat", referencedColumnName="id",  onDelete="CASCADE")
     * })
     * @Assert\NotBlank(message = "Please Select Product Category.")
     */
    private $fkProductCat;
    
    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=250, nullable=true, unique=true)
     * Assert\NotBlank(message = "Please enter unique product sku.")
     */
    private $sku;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\OneToMany(targetEntity="Bitcoin\AdminBundle\Entity\ProductImages", mappedBy="fkProduct")
     * 
     */
    private $images;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
    
    /**
     * Get price
     *
     * @return boolean 
     */
    public function getFeatured() {
        return $this->featured;
    }
    
   /**
    * Set Featured
    * 
    * @param boolean $featured
    * @return Product
    */
    public function setFeatured($featured) {
        $this->featured = $featured;
        return $this;
    }
    
    /**
     * Add child
     *
     * @param \Bitcoin\AdminBundle\Entity\ProductCategory $child
     * @return ProductCategory
     */
    public function addImages(\Bitcoin\AdminBundle\Entity\ProductImages $images)
    {
        $this->images[] = $images;
    
        return $this;
    }

    /**
     * Remove child
     *
     * @param \Bitcoin\AdminBundle\Entity\ProductCategory
     */
    public function removeImages(\Bitcoin\AdminBundle\Entity\ProductImages $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get child
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set priceListed
     *
     * @param float $priceListed
     * @return Product
     */
    public function setPriceListed($priceListed)
    {
        $this->priceListed = $priceListed;

        return $this;
    }

    /**
     * Get priceListed
     *
     * @return float 
     */
    public function getPriceListed()
    {
        return $this->priceListed;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Add images
     *
     * @param \Bitcoin\AdminBundle\Entity\ProductImages $images
     * @return Product
     */
    public function addImage(\Bitcoin\AdminBundle\Entity\ProductImages $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Bitcoin\AdminBundle\Entity\ProductImages $images
     */
    public function removeImage(\Bitcoin\AdminBundle\Entity\ProductImages $images)
    {
        $this->images->removeElement($images);
    }
}
