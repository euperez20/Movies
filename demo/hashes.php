<?php
    // Hashes demo
    // Hashes use keys to retrieve values, instead of zero-based integers

$actors = [
    'Patrick Stewart' => 'Jean-Luc Picard',
    'Kate Mulgrew' => 'Kathryn Janeway',
    'William Shatner' => 'James Kirk'];
echo "<p>The best Start Trek captain was {$actors['Patrick Stewart']}.</p>";

// Traversing hashing
foreach($actors as $actor => $captain){
    echo "<p>{$actor} played the role of captain {$captain}.</p>";
}

// An array of hashes
$employees = [
    [
        'name' => 'Jyn Erso',
        'position' => 'Rebel Scum'
    ],
    [
        'name' => 'Eunice Perez',
        'position' => 'Instructor Scum'
    ]
];
echo "<p>{$employees[1]['name']} is {$employees[1]['position']}.</p>";

foreach($employees as $employee){
    echo "<p>{$employee['name']} is {$employee['position']}.</p>";
}

?>