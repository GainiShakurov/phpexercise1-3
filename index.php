<?php

$animals = [
    "Eurasia" => ["Tiger", "Bison bonasus", "Panda"],
    "Africa" => ["African Elephant", "Baboon", "Buffalo"],
    "North America" => ["American Alligator", "Caribou", "American Beaver"],
    "South America" => ["Jaguar", "Guanaco", "Capybara"],
    "Australia" => ["Echidna", "Kangaroo", "Koala"],
    "Antarctica" => ["Wandering albatross", "King penguin", "Tern"]
];

$pr = ' ';

foreach ($animals as $continent => $value_array) {
    foreach ($value_array as $value_animal) {
        if (strrpos(strval($value_animal), ' ')) {
            /* Животные из двух слов*/
            $doubleWords[] = $value_animal;
            /* Первые слова с названиями континентов */
            $doubleWordsFirst[] = '<h2>' . $continent . '</h2>' . substr($value_animal, 0, strripos($value_animal, ' '));
            /* вторые слова */
            $doubleWordsSecond[] = substr($value_animal, strripos($value_animal, ' '), strlen($value_animal));
        }
    }
}

echo "<h3>Животные из двух слов</h3>";

echo '<pre>';
print_r($doubleWords);
echo '</pre>';

$arrayKeys = '012345';

/* Номера первых слов */
$firstWordNumbers = str_shuffle($arrayKeys);
/* Номера вторых слов */
$secondWordNumbers = str_shuffle($arrayKeys);

/* Итоговый массив из новых животных, с континентами */
for ($i = 0; $i < strlen($arrayKeys); $i++) {
    $newAnimals[] = $doubleWordsFirst[$firstWordNumbers[$i]] . $doubleWordsSecond[$secondWordNumbers[$i]];
}

echo "<h1>Новые животные из двух слов</h1>";

echo '<ul>';
foreach ($newAnimals as $animal) {
    echo '<li>';
    echo $animal;
    echo ($animal === end($newAnimals))? '</li>':',</li>'; // запятая если не последний элемент
}
echo '</ul>';

