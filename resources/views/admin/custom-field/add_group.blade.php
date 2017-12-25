@extends('admin.layout')
@section('content')
      <div id="content" class="bodylayout">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-list-ul"></i> Custom Field Create</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token"  id="ctr_token" value="{{ csrf_token() }}">

                    <div class="form-group{{ $errors->has('group_name') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Custom Field Name :</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control g_name" value="{{old('group_name')}}" name="group_name">@if ($errors->has('group_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('group_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cf_name1') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Custom Field Name1 :</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control cf_name1" value="{{old('cf_name1')}}" name="cf_name1">@if ($errors->has('cf_name1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cf_name1') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cf_type1') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Custom Field Type1 :</label>
                        <div class="col-md-9">
                              <select class="form-control cf_type1" name="cf_type1" required>
                                   <option value="0">Select Field Types</option>
                                   <option value="1">Text</option>
                                   <option value="2">Number</option>
                                   <option value="3">Date</option>
                                   <option value="4">Image/File</option>
                                   <option value="5">Textarea</option>
                              </select>@if ($errors->has('cf_type1'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('cf_type1') }}</strong>
                                  </span>
                              @endif
                          </div>
                    </div>

                        <div class="form-group{{ $errors->has('cf_name2') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Name2 :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control cf_name2" value="{{old('cf_name2')}}" name="cf_name2">@if ($errors->has('cf_name1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cf_name2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_type2') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Type2 :</label>
                            <div class="col-md-9">
                                  <select class="form-control cf_type2" name="cf_type2" required>
                                       <option value="0">Select Field Types</option>
                                       <option value="1">Text</option>
                                       <option value="2">Number</option>
                                       <option value="3">Date</option>
                                       <option value="4">Image/File</option>
                                       <option value="5">Textarea</option>
                                  </select>@if ($errors->has('cf_type2'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cf_type1') }}</strong>
                                      </span>
                                  @endif
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_name3') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Name3 :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control cf_name3" value="{{old('cf_name3')}}" name="cf_name3">@if ($errors->has('cf_name3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cf_name3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_type3') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Type3 :</label>
                            <div class="col-md-9">
                                  <select class="form-control cf_type3" name="cf_type3" required>
                                       <option value="0">Select Field Types</option>
                                       <option value="1">Text</option>
                                       <option value="2">Number</option>
                                       <option value="3">Date</option>
                                       <option value="4">Image/File</option>
                                       <option value="5">Textarea</option>
                                  </select>@if ($errors->has('cf_name3'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cf_name3') }}</strong>
                                      </span>
                                  @endif
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_name4') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Name4 :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control cf_name1" value="{{old('cf_name4')}}" name="cf_name4">@if ($errors->has('cf_name4'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cf_name4') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_type4') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Type4 :</label>
                            <div class="col-md-9">
                                  <select class="form-control cf_type4" name="cf_type4" required>
                                       <option value="0">Select Field Types</option>
                                       <option value="1">Text</option>
                                       <option value="2">Number</option>
                                       <option value="3">Date</option>
                                       <option value="4">Image/File</option>
                                       <option value="5">Textarea</option>
                                  </select>@if ($errors->has('cf_name4'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('cf_name4') }}</strong>
                                      </span>
                                  @endif
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_name5') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Name5 :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control cf_name5" value="{{old('cf_name5')}}" name="cf_name5">@if ($errors->has('cf_name5'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cf_name5') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cf_type5') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Custom Field Type5 :</label>
                            <div class="col-md-9">
                                  <select class="form-control cf_type5" name="cf_type5" required>
                                       <option value="0">Select Field Types</option>
                                       <option value="1">Text</option>
                                       <option value="2">Number</option>
                                       <option value="3">Date</option>
                                       <option value="4">Image/File</option>
                                       <option value="5">Textarea</option>
                                  </select>@if ($errors->has('cf_name5'))
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
@endsection
