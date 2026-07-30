<?php

require_once __DIR__ . '/Person.php';

class Student extends Person
{
    private int $id;
    private float $grade;

    public function __construct(int $id, string $name, float $grade)
    {
        parent::__construct($name);
        $this->id = $id;
        $this->setGrade($grade);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGrade(): float
    {
        return $this->grade;
    }

    public function setGrade(float $grade): void
    {
        if ($grade < 0 || $grade > 100) {
            throw new InvalidArgumentException('Grade must be between 0 and 100.');
        }

        $this->grade = $grade;
    }
}
