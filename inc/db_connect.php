<?php
function connection($host=DB_HOST,$user=DB_USER,$password=DB_PASSWORD,$database=DB_DATABASE)
{
  $link=mysqli_connect($host,$user,$password,$database);
  if(mysqli_connect_errno()){
      exit(mysqli_connect_error());
  }
  mysqli_set_charset($link,'utf8');
  return $link;
}
function execute_sql($link,$query)
{
    $result=mysqli_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $result;
}
function execute_bool($link,$query)
{
    $result=mysqli_real_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $result;

}
function  execute_multi($link,$mult_sql)
{
    if ($link->multi_query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    
    $link->close();
}

?>