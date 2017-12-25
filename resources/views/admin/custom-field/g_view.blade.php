@extends('master')
@section('content')

<table class="table cf_val_table">
    <tr>
          <td>{{$acf_group->cf_name1}}</td>
          <td>{{CustomField_Type($acf_group->cf_type1,1)}}</td>
    </tr>
    <tr>
          <td>{{$acf_group->cf_name2}}</td>
          <td>{{CustomField_Type($acf_group->cf_type2,2)}}</td>
    </tr>
    <tr>
          <td>{{$acf_group->cf_name3}}</td>
          <td>{{CustomField_Type($acf_group->cf_type3)}}</td>
    </tr>
    <tr>
          <td>{{$acf_group->cf_name4}}</td>
          <td>{{CustomField_Type($acf_group->cf_type4)}}</td>
    </tr>
    <tr>
          <td>{{$acf_group->cf_name5}}</td>
          <td>{{CustomField_Type($acf_group->cf_type5)}}</td>
    </tr>
</table>
  <a href="{{url('group_list')}}" class="btn btn-link pull-right"><< back</a>
      <?php
          function CustomField_Type($value) {
               switch ($value) {
                 case 1:
                     echo "<input type='text' class='form-control cf_value' name='cf_value[]'>";
                  break;
                 case 2:
                     echo "<input type='number' class='form-control cf_value' name='cf_value[]'>";
                  break;
                 case 3:
                    echo "<input type='date' class='form-control cf_value' name='cf_value[]'>";
                  break;
                 case 4:
                     echo "<input type='file' class='form-control cf_value' name='cf_value[]' multiple>";
                  break;
                  case 5:
                      echo "<textarea class='form-control cf_value' rows='8' cols='80' name='cf_value[]'></textarea>";
                   break;
                 default:
                     echo "<input type='text' class='form-control cf_type'>";

               }

           }
      ?>

@endsection
