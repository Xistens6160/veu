<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 *
 * @ApiResource
 */
class Comments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
     * @var string The Textpart of the Body
     * @ORM\Column(type="text")
     */
    public $commentbody;


    /**
     * @var string The author of the review.
     *
     * @ORM\Column
     */
    public $commentauthor;

    /**
     * @var int The date of publication of this review.
     *
     * @ORM\Column(type="string")
     */
    public $publicationDate;

    /**
     * @var Blogtext The Post the Comment is for
     *
     * @ORM\ManyToOne(targetEntity="Blogpost", inversedBy="comments")
     */
    public $blogtext;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
