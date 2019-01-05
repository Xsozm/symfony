<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=170, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $role ;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;



    /**
     * @ORM\Column(type="string", unique=true,length=170)
     */
    private $apiToken;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Group", inversedBy="users")
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Group", mappedBy="user")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getApiToken(){
        return $this->apiToken;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setApi($apitoken){
        $this->apiToken=$apitoken;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {


        return (['user','admin']);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getRole()
    {


        return $this->role;
    }

    public function setRole( $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?Group
    {
        return $this->name;
    }

    public function setName(?Group $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Group $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addUser($this);
        }

        return $this;
    }

    public function removeUser(Group $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeUser($this);
        }

        return $this;
    }
}
