<?php

namespace Disko\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Gedmo\Mapping\Annotation as Gedmo;


/**
 * This file has been generated by the Sonata EasyExtends bundle ( http://sonata-project.org/easy-extends )
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @ORM\Entity(repositoryClass="Disko\UserBundle\Repository\UserRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @ORM\Table(name="fos_user_user")
 */
class User extends BaseUser
{

    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Disko\DiskoBundle\Entity\Movie", mappedBy="user")
     **/
    private $movies ;

    /**
     * @ORM\OneToOne(targetEntity="Disko\DiskoBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     **/
    private $image;




    /**
     * @var string
     *
     * @ORM\Column(name="fn", type="string", length=255)
     */
    private $fn;


    /**
     * @var string
     *
     * @ORM\Column(name="ln", type="string", length=255)
     */
    private $ln;

    /**
     * @ORM\OneToMany(targetEntity="Disko\DiskoBundle\Entity\Vote", mappedBy="user")
     **/
    private $votes ;

    /**
     * @var integer
     *
     * @ORM\Column(name="gender", type="integer")
     */
    private $gender;


    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     */
    private $deletedAt;




    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fn
     *
     * @param string $fn
     * @return User
     */
    public function setFn($fn)
    {
        $this->fn = $fn;

        return $this;
    }

    /**
     * Get fn
     *
     * @return string 
     */
    public function getFn()
    {
        return $this->fn;
    }

    /**
     * Set ln
     *
     * @param string $ln
     * @return User
     */
    public function setLn($ln)
    {
        $this->ln = $ln;

        return $this;
    }

    /**
     * Get ln
     *
     * @return string 
     */
    public function getLn()
    {
        return $this->ln;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return User
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Add movies
     *
     * @param \Disko\DiskoBundle\Entity\Movie $movies
     * @return User
     */
    public function addMovie(\Disko\DiskoBundle\Entity\Movie $movies)
    {
        $this->movies[] = $movies;

        return $this;
    }

    /**
     * Remove movies
     *
     * @param \Disko\DiskoBundle\Entity\Movie $movies
     */
    public function removeMovie(\Disko\DiskoBundle\Entity\Movie $movies)
    {
        $this->movies->removeElement($movies);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * Set image
     *
     * @param \Disko\DiskoBundle\Entity\Image $image
     * @return User
     */
    public function setImage(\Disko\DiskoBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Disko\DiskoBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add votes
     *
     * @param \Disko\DiskoBundle\Entity\Vote $votes
     * @return User
     */
    public function addVote(\Disko\DiskoBundle\Entity\Vote $votes)
    {
        $this->votes[] = $votes;

        return $this;
    }

    /**
     * Remove votes
     *
     * @param \Disko\DiskoBundle\Entity\Vote $votes
     */
    public function removeVote(\Disko\DiskoBundle\Entity\Vote $votes)
    {
        $this->votes->removeElement($votes);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVotes()
    {
        return $this->votes;
    }
}
