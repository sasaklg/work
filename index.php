<?php
$arr_text_file = [];
$path_text_file="text.txt";
$word_count=0;
$arr_unique_word = [];
if (file_exists($path_text_file)) 
{
    $arr_text_file = file($path_text_file);
    foreach ($arr_text_file as $one_string_key => $one_string_value) 
    {
        $word_count+=str_word_count($one_string_value);
        
        $arr_one_string=preg_split("[\s*\s|\,|\;|\:\s*]",$one_string_value);
        foreach ($arr_one_string as $one_word_key => $one_word_value) 
        {
            if ($one_word_value!=null)
                if  (array_key_exists($one_word_value, $arr_unique_word))
                    $arr_unique_word[$one_word_value]++;
                else
                    $arr_unique_word[$one_word_value]=1;
        }
    }
} 
else
    echo "Не удалось найти файл";

echo "<b>ПОДСЧЁТ КОЛИЧЕСТВА СЛОВ В ТЕКСТЕ, КОЛ-ВО УНИКАЛЬНЫХ СЛОВ В ТЕКСТЕ И ВЫВОД МАССИВА СЛОВ С ЧАСТОТОЙ ВСТРЕЧАЕМОСТИ</b></br>"; 
echo "Сложность алгоритма: 2N </br>";  
echo "Всего, количество слов в файле: ".$word_count."</br>";
echo "Количество уникальных слов в файле: ".count($arr_unique_word);
echo "<pre>";
print_r($arr_unique_word);
echo "</pre>";
?>