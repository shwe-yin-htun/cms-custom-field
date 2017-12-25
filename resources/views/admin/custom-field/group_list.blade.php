
@extends('admin.layout')

@section('styles')
@parent
<!-- your custom css here -->
<style type="text/css">
.alert-success{
  display: block;
  background: #efefef;
  color: green;
}
</style>
@endsection

@section('content')

<div id="content" class="bodylayout"><!-- second common-->
	<div class="well">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<td width="40px;">NO</td>
						<td width="700px;">Name</td>
						<td><input type="submit" class="btn btn-xs btn-default" onclick="window.location.href='{{ route('admin.custom_field.add_new') }}'" value="Add New" ></td>
					</tr>
				</thead>
				<tbody>
					<?php $i=1 ?>
					@foreach($lists as $list)
					<tr>
						<td>{{$i++}}</td>
						<td>
							<a href="{{ route('admin.custom_field.g_view',$list->id) }}">{{$list->group_name}}</a>
						</td>
						<td>
							<input type="submit" class="btn btn-primary" onclick="window.location.href='{{ route('admin.custom_field.g_edit',$list->id) }}'" value="Edit">
							<input type="submit" class="btn btn-danger" onclick="window.location.href='{{ route('admin.custom_field.g_delete',$list->id)}}'" value="Delete">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>

		{!! $lists->render() !!}

	<input type="hidden" id="ctr_tocken" value="{{ csrf_token() }}" />
</div>
@endsection

@section('scripts')
@parent

<script type="text/javascript" src="{{ asset('js/getsubfrommain.js') }}"></script>

@endsection
