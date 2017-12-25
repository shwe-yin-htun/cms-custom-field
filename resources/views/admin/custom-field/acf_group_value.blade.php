
<table class="table cf_val_table">
    <tr>
          <?php $value = (($acf_values!="" )? $acf_values->cf_value1 : "") ?>
          <td>{{$acf_group->cf_name1}}</td>
          <td>{{CustomField_Type($acf_group->cf_type1,'cf_value1',$value)}}</td>
    </tr>
    <tr>
         <?php $value = (($acf_values!="" )? $acf_values->cf_value2 : "") ?>
          <td>{{$acf_group->cf_name2}}</td>
          <td>{{CustomField_Type($acf_group->cf_type2,'cf_value2',$value)}}</td>
    </tr>
    <tr>
         <?php $value = (($acf_values!="" )? $acf_values->cf_value3 : "") ?>
          <td>{{$acf_group->cf_name3}}</td>
          <td>{{CustomField_Type($acf_group->cf_type3,'cf_value3',$value)}}</td>
    </tr>
    <tr>
          <?php $value = (($acf_values!="" )? $acf_values->cf_value4 : "") ?>
          <td>{{$acf_group->cf_name4}}</td>
          <td>{{CustomField_Type($acf_group->cf_type4,'cf_value4',$value)}}</td>
    </tr>
    <tr>
          <?php $value = (($acf_values!="" )? $acf_values->cf_value5 : "") ?>
          <td>{{$acf_group->cf_name5}}</td>
          <td>{{CustomField_Type($acf_group->cf_type5,'cf_value5',$value)}}</td>
    </tr>
</table>
      <?php
          function CustomField_Type($type,$name,$value) {
               switch ($type) {
                 case 1:
                     echo "<input type='text' class='form-control cf_value' name='$name' value='$value' required>";
                  break;
                 case 2:
                     echo "<input type='number' class='form-control cf_value' name='$name' value='$value' required>";
                  break;
                 case 3:
                    echo "<input type='date' class='form-control cf_value' name='$name' value='$value' required>";
                  break;
                 case 4:
                     echo "<input type='file' class='form-control cf_value' name='$name' value='$value' multiple required>";
                  break;
                  case 5:
                      echo "<textarea class='form-control cf_value' rows='8' cols='80' name='$name' required>$value</textarea>";
                   break;
                 default:
                     echo "<input type='text' class='form-control cf_type'>";

               }
           }
      ?>
