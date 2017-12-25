{{CustomField_Type($id,'cf_value[]')}}
<?php
    function CustomField_Type($value,$name) {
         switch ($value) {
           case 1:
               echo "<input type='text' class='form-control cf_value' name='$name'>";
            break;
           case 2:
               echo "<input type='number' class='form-control cf_value' name='$name'>";
            break;
           case 3:
              echo "<input type='date' class='form-control cf_value' name='$name'>";
            break;
           case 4:
               echo "<input type='file' class='form-control cf_value' name='$name' multiple>";
            break;
            case 5:
                echo "<textarea class='form-control cf_value' rows='8' cols='80' name='$name'></textarea>";
             break;
           default:
               echo "<input type='text' class='form-control cf_type'>";

         }

     }
?>
