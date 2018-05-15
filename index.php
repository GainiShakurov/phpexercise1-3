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

$wordsCounter = 0;

foreach ($animals as $continent => $value_array) {
    foreach ($value_array as $value_animal) {
        if (str_word_count($value_animal) === 2) {
            $doubles[$continent][] = $value_animal;
            $wordsCounter++;
            $firstHalf[$continent][] = explode(' ', $value_animal)[0];
            $secondHalf[] = explode(' ', $value_animal)[1];
        }
    }
}

echo '<h3>Животные из двух слов</h3>';
echo '<pre>';
print_r($doubles);
echo '</pre>';

$arrayKeys = '';

for ($i = 0; $i < $wordsCounter; $i++) {
    $arrayKeys.= strval($i);
}

$randomNumbers = str_shuffle($arrayKeys);

foreach ($firstHalf as $continent => $animals) {
    foreach ($animals as $key => $animal) {
        $firstHalf[$continent][$key].= ' '.$secondHalf[substr($randomNumbers, 0, 1)];
        $randomNumbers = substr($randomNumbers, 1);
    }
}

echo '<h3>Итоговый результат</h3>';

foreach ($firstHalf as $continent => $animals) {
    echo '<h2>'.$continent.'</h2>';
    echo implode(', ', $animals);
}
