<?php

$menu = ["contacts" => "page1.php",
        "about us" => "page2.php",
        "products" => ["Product1" => "page11.php", "product2" => "page12.php", "product3" => "page13.php"],
        "Career" => ["Vacancy1" => "page21.php", "Vacancy2" => "page22.php", "Vacancy3" => "page23.php", "Vacancy4" => "page24.php"]
        ];
?>

<ul id="menu">
<?php
        foreach ($menu as $index => $value){
            if (is_array($value))   {
                echo "<li>$index<ul>";

                foreach ($value as $index1 => $value1){
                    echo "<li><a href=\"".$value1."\">".$index1."</a></li>";
                } 
               
                echo "</ul></li>";
            } else {
                echo "<li><a href=\"".$value."\">".$index."</a></li>";
            } 
        }
?>
</ul>
