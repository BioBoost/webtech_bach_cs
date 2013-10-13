<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PHP Example Code</title>
    </head>
    <body>

<?php
$student_grades = array('Jerry' => 16.5,
    'Mark' => 12, 'Elise' => 5.5, 'Sarah' => 17
);

foreach ($student_grades as $grade) {
    echo "<p>Someone has a grade of $grade/20</p>";
}

foreach ($student_grades as $student => $grade) {
    echo "<p>$student has a grade of $grade/20</p>";
}
?>
    </body>
</html>
