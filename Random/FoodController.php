<?php
require("Random/FoodModel.php");
class FoodController
{
    function CreateFoodDropdownList()
    {
        $FoodModel = new FoodModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type: 
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($FoodModel->GetFoodTypes()).
                    "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";
        return $result;
    }

    function CreateOptionValues(array $valueArray)
    {
        $result = "";

        foreach ($valueArray as $value)
        {
            $result = $result . "<option value = '$value' >$value</option>";
        }
        return $result;
    }

    function CreateFoodTables($types)
    {
        $foodModel = new FoodModel();
        $foodArray = $foodModel->GetFoodByType($types);
        $result = "";

        foreach ($foodArray as $key => $food)
        {
            $result = $result.
                "<table class = 'foodTable'>
                    <tr>
                        <th rowspan='6' width='150px'><img runat='server' src='$food->image' /></th>
                        <th width = '75px' >Name: </th>
                        <td>$food->name</td>
                    </tr>
                    
                    <tr>
                        <th>Type: </th>
                        <td>$food->type</td>
                    </tr>
                    
                    <tr>
                        <th>Price: </th>
                        <td>$food->price</td>
                    </tr>
                    
                    <tr>
                        <th>Fab Date: </th>
                        <td>$food->fabdate</td>
                    </tr>
                    
                    <tr>
                        <th>Company: </th>
                        <td>$food->company</td>
                    </tr>
                    
                    <tr>
                        <th>Review: </th>
                        <td colspan='2'>$food->review</td>
                    </tr>
                    
                    </table>";
        }
        return $result;
    }
}