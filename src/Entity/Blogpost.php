<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogpostRepository")
 * @ApiResource
 */
class Blogpost
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank
     * @var string The Title of the Post
     */
    public $headline;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank
     * @var string The Author Name
     */
    public $author;

    /**
     * @ORM\Column(type="text")
     * @var string The release Date
     */
    public $releaseDate;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @var string The Main Text
     */
    public $blogText;
    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string The Main Text Part
     */

    /**
     * @var string The subtext part
     * @ORM\Column(type="text")
     */
    public $subtext;

    /**
     * @var Comments[] Available Comments.
     *
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="blogtext")
     */
    public $comments;

    public function  __construct()
    {
        $this->comments = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param string $headline
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param string $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return string
     */
    public function getBlogText()
    {
        return $this->blogText;
    }

    /**
     * @param string $blogText
     */
    public function setBlogText($blogText)
    {
        $this->blogText = $blogText;
    }

    /**
     * @return string
     */
    public function getSubtext()
    {
        return $this->subtext;
    }

    /**
     * @param string $subtext
     */
    public function setSubtext($subtext)
    {
        $this->subtext = $subtext;
    }

    /**
     * @return Comments[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comments[] $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

}
