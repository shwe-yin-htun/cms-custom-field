@extends('admin.layout')

@section('styles')
@parent
<!-- your custom css here -->
@endsection

@section('content')

<div id="content" class="bodylayout"><!-- second common-->
	<div class="well">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark"><i class="fa fa-list-ul"></i> Post Create</h1>
			</div>
		</div>
		<div class="row">
			<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.post.store') }}">
                {!! csrf_field() !!}
				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Post Title</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('main_category_id') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Main Category</label>

                    <div class="col-md-9">
                        <select id="ctr_parent_id" class="form-control" name="main_category_id">
                            <option value="old('main_category_id') }}"></option>
                            @foreach($cat as $c)
                                <option value="{{ $c->id }}">{{ $c->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('main_category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('main_category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Sub Category</label>

                    <div class="col-md-9">
                        <select id="ctr_sub_id" class="form-control" name="sub_category_id">
                            <option value="{{old('sub_category_id')}}"></option>

                           <!--  @foreach($subcat as $sc)
                                <option value="{{ $sc->id }}">{{ $sc->title }}</option>
                            @endforeach -->

                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('feature_photo') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Feature Photo</label>

                    <div class="col-md-9">
                        <input type="file" class="form-control" value="{{old('feature_photo')}}" name="feature_photo">@if ($errors->has('feature_photo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('feature_photo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('attach_file') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Attach File</label>

                    <div class="col-md-9">
                        <input type="file" class="form-control" value="{{old('attach_file')}}" name="attach_file">@if ($errors->has('attach_file'))
                            <span class="help-block">
                                <strong>{{ $errors->first('attach_file') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Short Description</label>

                    <div class="col-md-9">
                        <textarea class="form-control" name="short_description">{{ old('short_description') }}</textarea>

                        @if ($errors->has('short_description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('short_description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('detail_photo') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Detail Photo</label>

                    <div class="col-md-9">
                        <input type="file" class="form-control" name="detail_photo">@if ($errors->has('detail_photo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('detail_photo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('detail_description') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Detail Description</label>

                    <div class="col-md-9">
                             <textarea class="form-control" id="summernote" style="height:300px" name="detail_description">{{ old('detail_description') }}</textarea>

                        @if ($errors->has('detail_description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('detail_description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


								<div class="form-group{{ $errors->has('acf_group') ? ' has-error' : '' }}">
										<label class="col-md-2 control-label">Coustom Field Lists </label>

										<div class="col-md-9">
												<select class="form-control acf_group" name="acf_group">
														<option value="0">None</option>
																@foreach ($acf as $value)
																			<option value="{{$value->id}}">{{$value->group_name}}</option>
																@endforeach
											 </select>
												@if ($errors->has('acf_group'))
														<span class="help-block">
																<strong>{{ $errors->first('acf_group') }}</strong>
														</span>
												@endif

												<div class="acf_group_value">

												</div>
										</div>

								</div>
								<hr>

								<div class="form-group{{ $errors->has('acf_group') ? ' has-error' : '' }}">
									 <label class="col-md-2 control-label">Custom Field Details</label>

									 <div class="col-md-9">
												 <table class="table myTable" style="display:none;">
														<thead>
																<th>Custom Field Name</th>
																<th>Custom Field Type</th>
																<th>Custom Field value</th>
																<th></th>
														</thead>
														<tbody>
														</tbody>
												</table>
												<button type="button" class="btn btn-success add_acf_detail">Add Field</button><br>
											 @if ($errors->has('acf_group'))
													 <span class="help-block">
															 <strong>{{ $errors->first('acf_group') }}</strong>
													 </span>
											 @endif
									 </div>
							 </div>
							 <hr>


								<div class="form-group">
										<div class="col-md-6 col-md-offset-6">
												<br>
												<button type="submit" class="btn btn-primary">
														Add
												</button>
										</div>
								</div>

            </form>
		</div>

	</div>
    <input type="hidden" id="ctr_tocken" value="{{ csrf_token() }}" />
</div>

@endsection

@section('scripts')
@parent

<script type="text/javascript" src="{{ asset('js/getsubfrommain.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
               height: 300,                 // set editor height
               minHeight: null,             // set minimum height of editor
               maxHeight: null,             // set maximum height of editor
               focus: true
        });
    });
  </script>
@endsection
