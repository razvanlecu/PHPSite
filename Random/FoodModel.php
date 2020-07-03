<?php
require("Random/FoodEntity.php");



$dberror1= "Could not connect to DB";
$dberror2= "Could not find table";

$Conn = mysqli_connect('localhost', 'root', '') or die($dberror1);
$Select_db = mysqli_select_db($Conn, 'magazindb') or die($dberror2);
$query = mysqli_query($Conn, "SELECT * FROM food");




class FoodModel
{
    public $dberror1= "Could not connect to DB";
    public $dberror2= "Could not find table";

    function GetFoodTypes()
    {

        $Conn = mysqli_connect('localhost', 'root', '') or die (mysqli_error( $Conn));
        mysqli_select_db($Conn, 'magazindb') or die('');

        $result = mysqli_query($Conn, "SELECT DISTINCT type FROM food") or die(mysqli_error( $Conn));
        $types = array();

        while ($row = mysqli_fetch_array($result))
        {
            array_push($types,$row[0]);
        }

        mysqli_close($Conn);
        return $types;
    }

    function GetFoodByType($type)
    {

        $Conn = mysqli_connect('localhost', 'root', '') or die (mysqli_error( $Conn));
        mysqli_select_db($Conn, 'magazindb') or die('');

        $query = "SELECT * FROM food WHERE type LIKE '$type'";
        $result = mysqli_query($Conn,$query) or die(mysqli_error( $Conn));
        $foodArray = array();

        while ($row = mysqli_fetch_row($result))
        {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $fabdate = $row[4];
            $company = $row[5];
            $image = $row[6];
            $review = $row[7];

            $food = new FoodEntity(-1,$name,$type,$price,$fabdate,$company,$image,$review);
            array_push($foodArray,$food);

        }

        mysqli_close($Conn);
        return $foodArray;
    }
}