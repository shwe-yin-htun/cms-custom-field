@extends('admin.layout')
@section('content')
      <div id="content" class="bodylayout">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-list-ul"></i> Custom Field Create</div>
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST" action="{{url('g_update',$acf_group->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token"  id="ctr_token" value="{{ csrf_token() }}">

                    <div class="form-group{{ $errors->has('group_name') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Custom Field Name :</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control g_name" v name="g_name" name="g_name" value="{{$acf_group->group_name}}" required>@if ($errors->has('g_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cf_name1') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Custom Field Name1 :</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control cf_name1" name="cf_name1" name="g_name" value="{{$acf_group->cf_name1}}" required>@if ($errors->has('cf_name1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cf_name1') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cf_type1') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Custom Field Type1 :</label>
                        <div class="col-md-9">
                           {{selectType($acf_group->cf_type1,'cf_type1')}}
                            @if ($errors->has('cf_type1'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('cf_type1') }}</strong>
                                  </span>
                              @endif
                          </div>
                    </div>

                        <div class="form-group{{ $errors->has('cf_name2') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Name2 :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control cf_name2" name="cf_name2"  value="{{$acf_group->cf_name2}}" required>@if ($errors->has('cf_name1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cf_name2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_type2') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Type2 :</label>
                            <div class="col-md-9">
                                {{selectType($acf_group->cf_type2,'cf_type2')}}
                                @if ($errors->has('cf_type2'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cf_type1') }}</strong>
                                      </span>
                                  @endif
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_name3') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Name3 :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control cf_name3" name="cf_name3" value="{{$acf_group->cf_name3}}" required>@if ($errors->has('cf_name3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cf_name3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_type3') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Type3 :</label>
                            <div class="col-md-9">
                                  {{selectType($acf_group->cf_type3,'cf_type3')}}
                                  @if ($errors->has('cf_name3'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cf_name3') }}</strong>
                                      </span>
                                  @endif
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_name4') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Name4 :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control cf_name1" name="cf_name4" value="{{$acf_group->cf_name4}}" required>@if ($errors->has('cf_name4'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cf_name4') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_type4') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Type4 :</label>
                            <div class="col-md-9">
                                {{selectType($acf_group->cf_type4,'cf_type4')}}
                                @if ($errors->has('cf_name4'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cf_name4') }}</strong>
                                      </span>
                                  @endif
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_name5') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Name5 :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control cf_name5" value="{{old('cf_name5')}}" name="cf_name5" value="{{$acf_group->cf_name5}}" required>@if ($errors->has('cf_name5'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cf_name5') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_type5') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Type5 :</label>
                            <div class="col-md-9">
                                  {{selectType($acf_group->cf_type5,'cf_type5')}}
                                  @if ($errors->has('cf_name5'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cf_name5') }}</strong>
                                      </span>
                                  @endif
                              </div>
                        </div>

                        <button type="button" class="btn btn-success pull-right acf_create">Create</button>
                </form>
        </div>
      </div>
   </div>

   
      <?php
             function selectType($value,$name)
               {
                     switch ($value) {
                       case 1:
                           echo "
                                 <select class='form-control $name' name='$name' required>
                                      <option value='1' selected>Text</option>
                                      <option value='2'>Number</option>
                                      <option value='3'>Date</option>
                                      <option value='4'>Image/File</option>
                                      <option value='5'>Textarea</option>
                                 </select>
                           ";
                        break;
                       case 2:
                               echo "
                                     <select class='form-control $name' name='$name' required>
                                          <option value='1' >Text</option>
                                          <option value='2' selected>Number</option>
                                          <option value='3'>Date</option>
                                          <option value='4'>Image/File</option>
                                          <option value='5'>Textarea</option>
                                     </select>
                               ";
                        break;
                       case 3:
                           echo "
                                 <select class='form-control $name' name='$name' required>
                                      <option value='1'>Text</option>
                                      <option value='2'>Number</option>
                                      <option value='3' selected>Date</option>
                                      <option value='4'>Image/File</option>
                                      <option value='5'>Textarea</option>
                                 </select>
                           ";
                        break;
                       case 4:
                             echo "
                                   <select class='form-control $name' name='$name' required>
                                        <option value='1'>Text</option>
                                        <option value='2'>Number</option>
                                        <option value='3'>Date</option>
                                        <option value='4' selected>Image/File</option>
                                        <option value='5'>Textarea</option>
                                   </select>
                             ";
                        break;
                        case 5:
                            echo "
                                  <select class='form-control $name' name='$name' required>
                                       <option value='1'>Text</option>
                                       <option value='2'>Number</option>
                                       <option value='3'>Date</option>
                                       <option value='4'>Image/File</option>
                                       <option value='5' selected>Textarea</option>
                                  </select>
                            ";
                         break;
                       default:
                             echo "
                                   <select class='form-control cf_type' name='cf_type' required>
                                        <option value='0'>Select Custom Field Type</option>
                                        <option value='1'>Text</option>
                                        <option value='2'>Number</option>
                                        <option value='3'>Date</option>
                                        <option value='4'>Image/File</option>
                                        <option value='5'>Textarea</option>
                                   </select>
                             ";

                     }
               }
       ?>
@endsection
