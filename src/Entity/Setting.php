<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SettingRepository")
 */
class Setting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Url(
     *    dnsMessage = "The host '{{ value }}' could not be resolved."
     * )
     *
     * @ORM\Column(type="string")
     */
    private $facebook;

    /**
     * @Assert\Url(
     *    dnsMessage = "The host '{{ value }}' could not be resolved."
     * )
     *
     * @ORM\Column(type="string")
     */
    private $twitter;

    /**
     * @Assert\Url(
     *    dnsMessage = "The host '{{ value }}' could not be resolved."
     * )
     *
     * @ORM\Column(type="string")
     */
    private $iTunes;

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
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param mixed $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return mixed
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param mixed $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return mixed
     */
    public function getITunes()
    {
        return $this->iTunes;
    }

    /**
     * @param mixed $iTunes
     */
    public function setITunes($iTunes)
    {
        $this->iTunes = $iTunes;
    }
}
