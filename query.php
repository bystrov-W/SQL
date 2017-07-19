<?php
header( 'Content-Type: text/html; charset=utf-8' );
$db = mysqli_connect("127.0.0.1", "root", "",  "books") or die(mysqli_error()); 
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET character_set_client = utf8");
mysql_query("SET character_set_connection = utf8");
mysql_query("SET character_set_results = utf8");//подключение к БД
$sql = mysqli_query($db, "SHOW TABLES FROM `books`"); //запрос

//кодировка
//mysql_query('SET NAMES utf8_general_ci');

//mysql_query ("set_client='utf8'");
//mysql_query ("set character_set_results='utf8'");
//mysql_query ("set collation_connection='utf8_general_ci'");
//mysql_query ("SET NAMES utf8");
//iconv( 'utf8', 'utf-8', 'Текст!' );

while ($row = mysqli_fetch_array($sql)) { // массив с данными
    echo "Таблица: <a href='?id_table={$row[0]}'>{$row[0]}</a><br>"; //вывод данных
}
 
echo "В базе `books`: ".mysqli_num_rows($sql)." таблиц"; // вывод числа таблиц
 
if (isset($_GET['id_table'])) { // если нажали на ссылку (название таблицы)
    $rs = mysqli_query($db, "SELECT * FROM ".$_GET['id_table']." "); //запрос на выборку данных и выбраной таблицы?>
     <table border='1'>
    <?php
    while($row_rs = mysqli_fetch_assoc($rs)) // массив с данными
    {
    ?>
        <tr>
    <?php
        foreach($row_rs as $val) //перебор массива в цикле
        {
 
            echo "<td>".$val."</td>"; //вывод данных
               
        }
    ?>
        </tr>
 
    <?php }?>
 
</table>
    
<?php }
?>