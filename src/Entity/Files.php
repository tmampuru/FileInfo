<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Files
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @var allImages[]
     * @ORM\Column(name="images", type="string")
     *
     */
    private $images;

    /**
     * Set images
     *
     * @param string $images
     *
     * @return allImages[]
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this->images;
    }

    /**
     * Get images
     *
     * @return allImages[]
     */
    public function getImages()
    {
        return $this->images;
    }

    public function addImage($images)
    {
        $this->images[] = $images;

        return $this;
    }
}
 ?>
