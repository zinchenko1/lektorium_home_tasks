<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CourseRepository")
 * @ORM\Table(name="course")
 */
class Course
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    public function __toString()
    {
        return $this->title;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Student", mappedBy="course")
     */
    private $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Student $course): string
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setCourse($this);
        }

        return $this;
    }

    public function removeCourse(Student $course): string
    {
        if ($this->courses->contains($course)) {
            $this->courses->removeElement($course);
            if ($course->getCourse() === $this) {
                $course->setCourse(null);
            }
        }

        return $this;
    }

//    public function __toString()
//    {
//        return ($this);
//    }
}
