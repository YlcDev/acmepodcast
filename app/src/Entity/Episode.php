<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\EpisodeRepository")
 */
class Episode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     *
     * @Assert\Length(
     *      min = 1,
     *      max = 50,
     *      minMessage = "The title must be at least {{ limit }} characters long",
     *      maxMessage = "The title cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(type="string")
     */
    private $title;

    /**     *
     * @Assert\NotBlank()
     *
     * @Assert\Length(
     *      min = 1,
     *      max = 200,
     *      minMessage = "The description must be at least {{ limit }} characters long",
     *      maxMessage = "The description cannot be longer than {{ limit }} characters"
     * )
     *
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @Assert\NotBlank()
     *
     * @Assert\Url(
     *    dnsMessage = "The host '{{ value }}' could not be resolved."
     * )
     *
     * @App\Validation\CorrectFormat
     *
     * @ORM\Column(type="string")
     */
    private $mediaFileUrl;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string")
     */
    private $link;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @Assert\NotBlank()
     *
     * @Assert\Date()
     *
     * @ORM\Column(type="date")
     */
    private $publishedDate;

    /**
     * @ORM\ManyToOne(targetEntity="Podcast")
     * @ORM\JoinColumn(name="podcast_id", referencedColumnName="id")
     */
    private $podcast;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMediaFile()
    {
        return $this->mediaFile;
    }

    /**
     * @param mixed $mediaFile
     */
    public function setMediaFile($mediaFile)
    {
        $this->mediaFile = $mediaFile;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link = null)
    {
        if (is_null($link)) {
            $link = uniqid();
        }

        $this->link = $link;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPodcast()
    {
        return $this->podcast;
    }

    /**
     * @param mixed $podcast
     */
    public function setPodcast($podcast)
    {
        $this->podcast = $podcast;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getMediaFileUrl()
    {
        return $this->mediaFileUrl;
    }

    /**
     * @param mixed $mediaFileUrl
     */
    public function setMediaFileUrl($mediaFileUrl)
    {
        $this->mediaFileUrl = $mediaFileUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * @param mixed $publishedDate
     */
    public function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;

        return $this;
    }
}
