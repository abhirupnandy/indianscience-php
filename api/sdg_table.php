<?php

declare(strict_types=1);

require __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');

$data = [
    [
        'subject' => 'Mathematical Sciences',
        'sdg1' => 3, 'sdg2' => 6, 'sdg3' => 137, 'sdg4' => 21, 'sdg5' => 2,
        'sdg6' => 16, 'sdg7' => 2318, 'sdg8' => 25, 'sdg9' => 6, 'sdg10' => 367,
        'sdg11' => 48, 'sdg12' => 41, 'sdg13' => 408, 'sdg14' => 1, 'sdg15' => 3,
        'sdg16' => 24, 'sdg17' => 0,
    ],
    [
        'subject' => 'Physical Sciences',
        'sdg1' => 0, 'sdg2' => 5, 'sdg3' => 49, 'sdg4' => 6, 'sdg5' => 0,
        'sdg6' => 4, 'sdg7' => 1716, 'sdg8' => 1, 'sdg9' => 1, 'sdg10' => 33,
        'sdg11' => 12, 'sdg12' => 3, 'sdg13' => 37, 'sdg14' => 1, 'sdg15' => 1,
        'sdg16' => 6, 'sdg17' => 0,
    ],
    [
        'subject' => 'Chemical Sciences',
        'sdg1' => 0, 'sdg2' => 46, 'sdg3' => 410, 'sdg4' => 10, 'sdg5' => 0,
        'sdg6' => 145, 'sdg7' => 9425, 'sdg8' => 7, 'sdg9' => 4, 'sdg10' => 3,
        'sdg11' => 96, 'sdg12' => 159, 'sdg13' => 1395, 'sdg14' => 45, 'sdg15' => 3,
        'sdg16' => 24, 'sdg17' => 0,
    ],
    [
        'subject' => 'Earth Sciences',
        'sdg1' => 2, 'sdg2' => 26, 'sdg3' => 18, 'sdg4' => 1, 'sdg5' => 0,
        'sdg6' => 402, 'sdg7' => 232, 'sdg8' => 3, 'sdg9' => 1, 'sdg10' => 1,
        'sdg11' => 99, 'sdg12' => 5, 'sdg13' => 1687, 'sdg14' => 89, 'sdg15' => 17,
        'sdg16' => 2, 'sdg17' => 0,
    ],
    [
        'subject' => 'Environmental Sciences',
        'sdg1' => 12, 'sdg2' => 429, 'sdg3' => 100, 'sdg4' => 1, 'sdg5' => 0,
        'sdg6' => 282, 'sdg7' => 300, 'sdg8' => 41, 'sdg9' => 3, 'sdg10' => 8,
        'sdg11' => 248, 'sdg12' => 139, 'sdg13' => 789, 'sdg14' => 179, 'sdg15' => 819,
        'sdg16' => 26, 'sdg17' => 3,
    ],
    [
        'subject' => 'Biological Sciences',
        'sdg1' => 12, 'sdg2' => 995, 'sdg3' => 2259, 'sdg4' => 27, 'sdg5' => 0,
        'sdg6' => 245, 'sdg7' => 1321, 'sdg8' => 67, 'sdg9' => 0, 'sdg10' => 10,
        'sdg11' => 85, 'sdg12' => 260, 'sdg13' => 1008, 'sdg14' => 238, 'sdg15' => 550,
        'sdg16' => 25, 'sdg17' => 1,
    ],
    [
        'subject' => 'Agricultural and Veterinary Sciences',
        'sdg1' => 16, 'sdg2' => 791, 'sdg3' => 242, 'sdg4' => 3, 'sdg5' => 0,
        'sdg6' => 88, 'sdg7' => 188, 'sdg8' => 62, 'sdg9' => 0, 'sdg10' => 3,
        'sdg11' => 9, 'sdg12' => 134, 'sdg13' => 302, 'sdg14' => 53, 'sdg15' => 187,
        'sdg16' => 10, 'sdg17' => 0,
    ],
    [
        'subject' => 'Information and Computing Sciences',
        'sdg1' => 17, 'sdg2' => 103, 'sdg3' => 1872, 'sdg4' => 536, 'sdg5' => 3,
        'sdg6' => 39, 'sdg7' => 6596, 'sdg8' => 376, 'sdg9' => 105, 'sdg10' => 91,
        'sdg11' => 540, 'sdg12' => 162, 'sdg13' => 619, 'sdg14' => 21, 'sdg15' => 20,
        'sdg16' => 389, 'sdg17' => 1,
    ],
    [
        'subject' => 'Engineering',
        'sdg1' => 15, 'sdg2' => 123, 'sdg3' => 872, 'sdg4' => 80, 'sdg5' => 2,
        'sdg6' => 712, 'sdg7' => 26284, 'sdg8' => 119, 'sdg9' => 81, 'sdg10' => 59,
        'sdg11' => 1025, 'sdg12' => 639, 'sdg13' => 6723, 'sdg14' => 82, 'sdg15' => 59,
        'sdg16' => 28, 'sdg17' => 3,
    ],
    [
        'subject' => 'Technology',
        'sdg1' => 2, 'sdg2' => 34, 'sdg3' => 438, 'sdg4' => 16, 'sdg5' => 0,
        'sdg6' => 16, 'sdg7' => 7109, 'sdg8' => 43, 'sdg9' => 22, 'sdg10' => 7,
        'sdg11' => 131, 'sdg12' => 12, 'sdg13' => 101, 'sdg14' => 8, 'sdg15' => 1,
        'sdg16' => 23, 'sdg17' => 0,
    ],
    [
        'subject' => 'Medical and Health Sciences',
        'sdg1' => 220, 'sdg2' => 1826, 'sdg3' => 28135, 'sdg4' => 809, 'sdg5' => 67,
        'sdg6' => 461, 'sdg7' => 383, 'sdg8' => 295, 'sdg9' => 9, 'sdg10' => 402,
        'sdg11' => 517, 'sdg12' => 47, 'sdg13' => 164, 'sdg14' => 10, 'sdg15' => 2,
        'sdg16' => 772, 'sdg17' => 21,
    ],
    [
        'subject' => 'Built Environment and Design',
        'sdg1' => 0, 'sdg2' => 0, 'sdg3' => 2, 'sdg4' => 2, 'sdg5' => 0,
        'sdg6' => 1, 'sdg7' => 202, 'sdg8' => 2, 'sdg9' => 0, 'sdg10' => 0,
        'sdg11' => 196, 'sdg12' => 2, 'sdg13' => 38, 'sdg14' => 0, 'sdg15' => 0,
        'sdg16' => 0, 'sdg17' => 0,
    ],
    [
        'subject' => 'Education',
        'sdg1' => 5, 'sdg2' => 13, 'sdg3' => 74, 'sdg4' => 1874, 'sdg5' => 12,
        'sdg6' => 5, 'sdg7' => 6, 'sdg8' => 16, 'sdg9' => 3, 'sdg10' => 23,
        'sdg11' => 12, 'sdg12' => 1, 'sdg13' => 5, 'sdg14' => 0, 'sdg15' => 0,
        'sdg16' => 24, 'sdg17' => 3,
    ],
    [
        'subject' => 'Economics',
        'sdg1' => 330, 'sdg2' => 143, 'sdg3' => 577, 'sdg4' => 57, 'sdg5' => 12,
        'sdg6' => 102, 'sdg7' => 1205, 'sdg8' => 1031, 'sdg9' => 59, 'sdg10' => 556,
        'sdg11' => 188, 'sdg12' => 123, 'sdg13' => 538, 'sdg14' => 8, 'sdg15' => 27,
        'sdg16' => 195, 'sdg17' => 31,
    ],
    [
        'subject' => 'Commerce, Management, Tourism and Services',
        'sdg1' => 25, 'sdg2' => 10, 'sdg3' => 41, 'sdg4' => 50, 'sdg5' => 17,
        'sdg6' => 6, 'sdg7' => 87, 'sdg8' => 623, 'sdg9' => 31, 'sdg10' => 60,
        'sdg11' => 86, 'sdg12' => 662, 'sdg13' => 57, 'sdg14' => 0, 'sdg15' => 1,
        'sdg16' => 189, 'sdg17' => 12,
    ],
    [
        'subject' => 'Studies in Human Society',
        'sdg1' => 202, 'sdg2' => 98, 'sdg3' => 369, 'sdg4' => 363, 'sdg5' => 182,
        'sdg6' => 121, 'sdg7' => 269, 'sdg8' => 437, 'sdg9' => 26, 'sdg10' => 454,
        'sdg11' => 620, 'sdg12' => 35, 'sdg13' => 340, 'sdg14' => 11, 'sdg15' => 36,
        'sdg16' => 1080, 'sdg17' => 57,
    ],
    [
        'subject' => 'Psychology and Cognitive Sciences',
        'sdg1' => 4, 'sdg2' => 44, 'sdg3' => 436, 'sdg4' => 355, 'sdg5' => 14,
        'sdg6' => 8, 'sdg7' => 90, 'sdg8' => 121, 'sdg9' => 0, 'sdg10' => 21,
        'sdg11' => 45, 'sdg12' => 9, 'sdg13' => 20, 'sdg14' => 1, 'sdg15' => 1,
        'sdg16' => 202, 'sdg17' => 0,
    ],
    [
        'subject' => 'Law and Legal Studies',
        'sdg1' => 5, 'sdg2' => 2, 'sdg3' => 69, 'sdg4' => 23, 'sdg5' => 13,
        'sdg6' => 6, 'sdg7' => 17, 'sdg8' => 29, 'sdg9' => 0, 'sdg10' => 23,
        'sdg11' => 7, 'sdg12' => 4, 'sdg13' => 13, 'sdg14' => 6, 'sdg15' => 6,
        'sdg16' => 561, 'sdg17' => 3,
    ],
    [
        'subject' => 'Studies in Creative Arts and Writing',
        'sdg1' => 0, 'sdg2' => 0, 'sdg3' => 2, 'sdg4' => 4, 'sdg5' => 0,
        'sdg6' => 1, 'sdg7' => 2, 'sdg8' => 0, 'sdg9' => 0, 'sdg10' => 1,
        'sdg11' => 0, 'sdg12' => 0, 'sdg13' => 2, 'sdg14' => 0, 'sdg15' => 0,
        'sdg16' => 8, 'sdg17' => 0,
    ],
    [
        'subject' => 'Language, Communication and Culture',
        'sdg1' => 9, 'sdg2' => 6, 'sdg3' => 31, 'sdg4' => 143, 'sdg5' => 45,
        'sdg6' => 2, 'sdg7' => 12, 'sdg8' => 17, 'sdg9' => 0, 'sdg10' => 65,
        'sdg11' => 13, 'sdg12' => 13, 'sdg13' => 5, 'sdg14' => 0, 'sdg15' => 1,
        'sdg16' => 177, 'sdg17' => 0,
    ],
    [
        'subject' => 'History and Archaeology',
        'sdg1' => 5, 'sdg2' => 5, 'sdg3' => 36, 'sdg4' => 28, 'sdg5' => 5,
        'sdg6' => 3, 'sdg7' => 14, 'sdg8' => 16, 'sdg9' => 0, 'sdg10' => 41,
        'sdg11' => 14, 'sdg12' => 1, 'sdg13' => 15, 'sdg14' => 0, 'sdg15' => 1,
        'sdg16' => 196, 'sdg17' => 5,
    ],
    [
        'subject' => 'Philosophy and Religious Studies',
        'sdg1' => 4, 'sdg2' => 1, 'sdg3' => 5, 'sdg4' => 28, 'sdg5' => 4,
        'sdg6' => 2, 'sdg7' => 5, 'sdg8' => 1, 'sdg9' => 0, 'sdg10' => 25,
        'sdg11' => 5, 'sdg12' => 0, 'sdg13' => 2, 'sdg14' => 0, 'sdg15' => 4,
        'sdg16' => 67, 'sdg17' => 0,
    ],
];

$draw = isset($_POST['draw']) ? (int) $_POST['draw'] : 0;

echo json_encode([
    'draw' => $draw,
    'recordsTotal' => count($data),
    'recordsFiltered' => count($data),
    'data' => $data,
], JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);