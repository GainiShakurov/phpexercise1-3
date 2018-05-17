<?php

$animals = [
    "Eurasia" => ["Tiger", "Bison bonasus", "Panda"],
    "Africa" => ["African Elephant", "Baboon", "Buffalo"],
    "North America" => ["American Alligator", "Caribou", "American Beaver"],
    "South America" => ["Jaguar", "Guanaco", "Capybara"],
    "Australia" => ["Echidna", "Kangaroo", "Koala"],
    "Antarctica" => ["Wandering albatross", "King penguin", "Tern"]
];

echo '<h3>Исходные животные</h3>';
echo '<pre>';
print_r($animals);
echo '</pre>';

$firstHalf = $secondHalf = $doubles = [];

foreach ($animals as $continent => $value_array) {
    foreach ($value_array as $value_animal) {
        if (str_word_count($value_animal) === 2) {
            $doubles[$continent][] = $value_animal;
            $exploded = explode(' ', $value_animal);
            $firstHalf[$continent][] = $exploded[0];
            $secondHalf[] = $exploded[1];
        }
    }
}

shuffle($secondHalf);

echo '<h3>Животные из двух слов</h3>';
echo '<pre>';
print_r($doubles);
echo '</pre>';

$counter = 0;

foreach ($firstHalf as $continent => $animals) {
    foreach ($animals as $key => $animal) {
        $firstHalf[$continent][$key] .= ' ' . $secondHalf[$counter];
        $counter++;
    }
}

echo '<h3>Итоговый результат</h3>';

foreach ($firstHalf as $continent => $animals) {
    echo '<h2>' . $continent . '</h2>';
    echo implode(', ', $animals);
}
