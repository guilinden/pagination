<table>
  <tr>
    <th>#</th>
    <th>Content<th>
  <tr>
<?php
  $connection = mysql_connect("localhost","root","");
  mysql_select_db("pagination",$connection);
  $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1; //GET the page number from URL
  $perPage = 3; //Set number of items per page
  $cont = 0;
  $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
  $sql = mysql_query("SELECT * FROM articles LIMIT {$start},{$perPage}");
  while($row=mysql_fetch_array($sql)){
    $cont++;
    Print '<tr>';
      Print '<th>'. $row['id'] . "</th>";
      Print '<td>'. $row['name'] . "</td>";
    Print '<tr>';
  }


  $sql  = mysql_query("SELECT * FROM articles ");
  $total = mysql_num_rows($sql);
  $pages = ceil($total / $perPage);

  for ($i=1; $i <= $pages ; $i++) {
    echo '<a href="index.php?page='. $i .'">' . $i . '</a>';
    echo " - ";
  }





 ?>
</table>
