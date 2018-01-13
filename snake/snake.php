<?
header('Content-Type: text/html; charset=utf-8');
?>

<html>
 <head>
  <title>Массив</title>
 </head>
 <body>

<?php

echo "Число строк: " .  $_POST['row']. "<br/>";
echo "Число столбцов: " . $_POST['column']. "<br/>";


// // Заполнение массива
$n = $_POST['row'];
$n2 = $_POST['column'];
$start = 1;

// Если кол-во строк < кол-ва столбцов
if ($n > $n2){
  for ($i = 0; $i < $n; $i++)
          for ($j = 0; $j < $n2; $j++)
                  $field[$i][$j] = $start++;
} else {
  for ($i = 0; $i < $n2; $i++)
          for ($j = 0; $j < $n2; $j++)
                  $field[$i][$j] = $start++;
}


//Вывод исходного массива
echo "Исходный массив: <br/>";
            for ($i = 0; $i < $n; $i++)
              {
                for ($j=0; $j <$n2; $j++)
                {
                   echo ' | '.$field[$i][$j];
                }
                echo '<br />';
              }

// Функция змейки
// $m  = число строк
// $n = число столбцов
// $input_arr = сформированный массив
function snake($m, $n, $input_arr)
{

$i;
$k = 0;
$l = 0;

/*     k - начальный индекс строки
       m - конечный индекс строки
       l - индекс начального столбца
       n - конечный индекс столбца
       i - итератор
  */

  while ($k < $m && $l < $n)
      {
          /* Вывод 1-ой строки слевого верхнего - вправо */
          for ($i = $l; $i < $n; ++$i)
          {
               echo ' '. $input_arr[$k][$i];
          }
          $k++;

          /* Вывод последнего столбца: с правого верхнего + 1(вниз) - вниз*/
          for ($i = $k; $i < $m; ++$i)
          {
               echo ' '. $input_arr[$i][$n-1];
          }
          $n--;

          /* Вывод последней строки из оставшихся: с правого нижнего + 1(влево) - налево*/
          if ( $k < $m)
          {
              for ($i = $n-1; $i >= $l; --$i)
              {
                   echo ' '. $input_arr[$m-1][$i];
              }
              $m--;
          }

          /* Вывод 1-го столбца из оставшихся: с левого нижнего + 1(вверх) - вверх */
          if ($l < $n)
          {
              for ($i = $m-1; $i >= $k; --$i)
              {
                   echo ' '. $input_arr[$i][$l];
              }
              $l++;
          }
      }
  }

  echo "Получившейся массив: <br/>";
  $end_array = snake($n, $n2, $field) ."<br/>" ;

?>


 </body>
</html>