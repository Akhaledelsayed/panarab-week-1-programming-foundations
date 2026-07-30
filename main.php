<?php

require_once __DIR__ . '/StudentManager.php';

$manager = new StudentManager();

try {
    $manager->addStudent(new Student(1, 'Ahmed', 85));
    $manager->addStudent(new Student(2, 'Mona', 92));
    $manager->addStudent(new Student(3, 'Omar', 67));

    echo 'All Students:' . PHP_EOL;

    foreach ($manager->listStudents() as $student) {
        echo $student->getId() . ' - ' . $student->getName() . ' - Grade: ' . $student->getGrade() . PHP_EOL;
    }

    echo PHP_EOL;

    $found = $manager->findStudentById(2);

    if ($found !== null) {
        echo 'Found Student: ' . $found->getName() . PHP_EOL;
    } else {
        echo 'Student not found.' . PHP_EOL;
    }

    echo PHP_EOL;

    $manager->updateStudentGrade(3, 75);
    echo "Omar's grade updated." . PHP_EOL;

    echo PHP_EOL;

    $removed = $manager->removeStudentById(1);

    if ($removed) {
        echo 'Student with ID 1 removed.' . PHP_EOL;
    }

    echo PHP_EOL;
    echo 'Remaining Students:' . PHP_EOL;

    foreach ($manager->listStudents() as $student) {
        echo $student->getId() . ' - ' . $student->getName() . ' - Grade: ' . $student->getGrade() . PHP_EOL;
    }

    echo PHP_EOL;
    echo 'Average Grade: ' . $manager->getAverageGrade() . PHP_EOL;
} catch (InvalidArgumentException $exception) {
    echo 'Error: ' . $exception->getMessage() . PHP_EOL;
}
