<?php
$array = ["Московская область" => ["Зеленоград", "Клин", "Мытищи"],
        "Ленинградская область" => ["Всеволжск", "Павловск", "Крондштадт"],
        "Томская область" => ["Кедровый", "Асино", "Стрежевой", "Томск"],
        "Кемеровская область" => ["Кемерово", "Прокопьевск", "Юрга", "Новокузнецк","Тайга"],
        "Краснодарский край" => ["Краснодар", "Новороссийск", "Анапа", "Сочи"],
        "Самарская область" => ["Самара", "Тольятти", "Сызрань", "Кинель"],
        "Новосибирская область" => ["Новосибирск", "Бердск", "Куйбышев", "Барабинск"],
        "Красноярский край" => ["Красноярск", "Норильск", "Ачинск", "Дивногорск", "Канск"],
        "Иркутская область" => ["Иркутск", "Братск", "Ангарск", "Шелехов"],
        "Псковская область" => ["Псков", "Остров", "Великие Луки"],
        "Ставропольский край" => ["Ставрополь", "Пятигорск", "Кисловодск", "Минеральные воды"],
        "Астраханская область" => ["Астрахань", "Знаменск"],
        "Республика Алтай" => ["Горно-Алтайск"],
        "Амурская область" => ["Благовещенск","Белогорск","Тында"],
        "Белгородская область" => ["Белгород","Гайворон","Старый Оскол"]
        ];
foreach ($array as $key => $value)   {
    echo "<b>$key:</b><br>";
    echo implode($value, ", ")."<br>";
    }
?>