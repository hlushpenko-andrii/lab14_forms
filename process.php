
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    $errors = [];

    if (trim($name) === '') {
        $errors[] = "Поле 'Ім'я' не може бути порожнім.";
    }

    if (trim($email) === '') {
        $errors[] = "Поле 'Email' не може бути порожнім.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введіть коректний email.";
    }

    if ($errors) {
        echo "<p>Виникли помилки:</p><ul>";

        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err, ENT_QUOTES, 'UTF-8') . "</li>";
        }

        echo "</ul><a href='form.html'>Назад до форми</a>";
    } else {
        echo "<p>Дякуємо, <b>" .
            htmlspecialchars($name, ENT_QUOTES, 'UTF-8') .
            "</b>!</p>";

        echo "<p>Ми зв'яжемося з вами на <b>" .
            htmlspecialchars($email, ENT_QUOTES, 'UTF-8') .
            "</b>.</p>";
    }
} else {
    echo "Будь ласка, відкрийте <a href='form.html'>форму</a>.";
}
