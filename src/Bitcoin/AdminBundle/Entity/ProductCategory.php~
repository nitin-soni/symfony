<?php

namespace Bitcoin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bitcoin\AdminBundle\Entity\ProductCategory
 *
 * @ORM\Table(name="product_category", indexes={@ORM\Index(name="fk_parent", columns={"fk_parent"})})
 * @ORM\Entity(repositoryClass="Bitcoin\AdminBundle\Repository\ProductCategoryRepository")
 */
class ProductCategory
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
     * @ORM\Column(name="category_name", type="string", length=250, nullable=false)
     * @Assert\NotBlank
     */
    private $categoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
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
     * @ORM\ManyToOne(targetEntity="Bitcoin\AdminBundle\Entity\ProductCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_parent", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $fkParent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Bitcoin\AdminBundle\Entity\ProductCategory", mappedBy="fkParent", cascade={"persist"})
     */
    private $child;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->child = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set categoryName
     *
     * @param string $categoryName
     * @return ProductCategory
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ProductCategory
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
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return ProductCategory
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
     * @return ProductCategory
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
     * Set fkParent
     *
     * @param \Bitcoin\AdminBundle\Entity\ProductCategory $fkParent
     * @return ProductCategory
     */
    public function setFkParent(\Bitcoin\AdminBundle\Entity\ProductCategory $fkParent = null)
    {
        $this->fkParent = $fkParent;

        return $this;
    }

    /**
     * Get fkParent
     *
     * @return \Bitcoin\AdminBundle\Entity\ProductCategory 
     */
    public function getFkParent()
    {
        return $this->fkParent;
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
     * Add child
     *
     * @param \Bitcoin\AdminBundle\Entity\ProductCategory $child
     * @return ProductCategory
     */
    public function addChild(\Bitcoin\AdminBundle\Entity\ProductCategory $child)
    {
        $this->child[] = $child;
    
        return $this;
    }

    /**
     * Remove child
     *
     * @param \Bitcoin\AdminBundle\Entity\ProductCategory
     */
    public function removeChild(\Bitcoin\AdminBundle\Entity\ProductCategory $child)
    {
        $this->child->removeElement($child);
    }

    /**
     * Get child
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChild()
    {
        return $this->child;
    }
}
