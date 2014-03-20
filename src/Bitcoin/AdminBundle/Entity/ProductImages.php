<?php

namespace Bitcoin\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProductImages
 *
 * @ORM\Table(name="product_images", indexes={@ORM\Index(name="fk_product", columns={"fk_product"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ProductImages {

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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

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
     * @var \Bitcoin\AdminBundle\Entity\Product
     * 
     * @ORM\ManyToOne(targetEntity="Bitcoin\AdminBundle\Entity\Product", inversedBy="id")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_product", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $fkProduct;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="featured", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $featured;
    
    /**
     * @Assert\File(
     *      maxSize="5M",
     *      mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *      maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *      mimeTypesMessage = " Please upload only JPG, GIF or PNG image."
     * )
     */
    private $file;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return ProductImages
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return ProductImages
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return ProductImages
     */
    public function setCreatedDate() {
        $this->createdDate = new \DateTime();

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate() {
        return $this->createdDate;
    }

    /**
     * Set modifiedDate
     *
     * @param \DateTime $modifiedDate
     * @return ProductImages
     */
    public function setModifiedDate() {
        $this->modifiedDate = new \DateTime();

        return $this;
    }

    /**
     * Get modifiedDate
     *
     * @return \DateTime 
     */
    public function getModifiedDate() {
        return $this->modifiedDate;
    }

    /**
     * Set fkProduct
     *
     * @param \Bitcoin\AdminBundle\Entity\Product $fkProduct
     * @return ProductImages
     */
    public function setFkProduct(\Bitcoin\AdminBundle\Entity\Product $fkProduct = null) {
        $this->fkProduct = $fkProduct;

        return $this;
    }

    /**
     * Get fkProduct
     *
     * @return \Bitcoin\AdminBundle\Entity\Product 
     */
    public function getFkProduct() {
        return $this->fkProduct;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . DIRECTORY_SEPARATOR . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . DIRECTORY_SEPARATOR . $this->path;
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        return 'uploads/images';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename . '.' . $this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload() {
        if (file_exists($this->getAbsolutePath())) {
            if ($this->getUploadRootDir() . $this->path = $this->getAbsolutePath()) {
                unlink($this->path);
            }
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

}
