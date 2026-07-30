<?php

require_once __DIR__ . '/Student.php';

class StudentManager
{
    private array $students = [];

    public function addStudent(Student $student): void
    {
        if ($this->findStudentById($student->getId()) !== null) {
            throw new InvalidArgumentException('Student ID already exists.');
        }

        $this->students[] = $student;
    }

    public function listStudents(): array
    {
        return $this->students;
    }

    public function findStudentById(int $id): ?Student
    {
        foreach ($this->students as $student) {
            if ($student->getId() === $id) {
                return $student;
            }
        }

        return null;
    }

    public function removeStudentById(int $id): bool
    {
        foreach ($this->students as $index => $student) {
            if ($student->getId() === $id) {
                unset($this->students[$index]);
                $this->students = array_values($this->students);
                return true;
            }
        }

        return false;
    }

    public function updateStudentGrade(int $id, float $newGrade): bool
    {
        $student = $this->findStudentById($id);

        if ($student === null) {
            return false;
        }

        $student->setGrade($newGrade);
        return true;
    }

    public function getAverageGrade(): float
    {
        if (count($this->students) === 0) {
            return 0;
        }

        $total = 0;

        foreach ($this->students as $student) {
            $total += $student->getGrade();
        }

        return $total / count($this->students);
    }
}
