
<div class="form-group  row {{ $errors->has('store_name') ? 'has-error' : '' }}">
	<label class="col-sm-3 col-form-label"><strong>Store Name</strong> <span class="text-danger">*</span></label>
	<div class="col-sm-9">{!! Form::text('store_name',@$store->store_name,[
		'class' => 'form-control',
		'id'	=> 'title',
		'maxlength' => '30'
		]) !!}
		<span class="help-block">
			<font color="red"> {{ $errors->has('store_name') ? "".$errors->first('store_name')."" : '' }} </font>
		</span>
	</div>
</div>

<div class="form-group  row {{ $errors->has('email') ? 'has-error' : '' }}">
	<label class="col-sm-3 col-form-label"><strong>Store Email</strong> <span class="text-danger">*</span></label>
	<div class="col-sm-9">{!! Form::text('email',@$store->email,[
		'class' => 'form-control',
		'id'	=> 'title'
		]) !!}
		<span class="help-block">
			<font color="red"> {{ $errors->has('email') ? "".$errors->first('email')."" : '' }} </font>
		</span>
	</div>
</div>

<div class="form-group  row {{ $errors->has('mobile') ? 'has-error' : '' }}">
	<label class="col-sm-3 col-form-label"><strong>Store Mobile</strong> <span class="text-danger">*</span></label>
	<div class="col-sm-9">{!! Form::text('mobile',@$store->mobile,[
		'class' => 'form-control',
		'id'	=> 'title'
		]) !!}
		<span class="help-block">
			<font color="red"> {{ $errors->has('mobile') ? "".$errors->first('mobile')."" : '' }} </font>
		</span>
	</div>
</div>

<div class="form-group row {{ $errors->has('address') ? 'has-error' : '' }}">
	<label class="col-sm-3 col-form-label"><strong>Address</strong> <span class="text-danger">*</span></label>
	<div class="col-sm-9">{!! Form::textarea('address',@$store->address,[
		'class' => 'form-control ',
		'id'	=> 'description'
		]) !!}
		<span class="help-block">
			<font color="red"> {{ $errors->has('address') ? "".$errors->first('address')."" : '' }} </font>
		</span>
	</div>
</div>

<div class="form-group row {{ $errors->has('store_image') ? 'has-error' : '' }}">
	<label class="col-sm-3 col-form-label"><strong>Upload Image</strong> <span class="text-danger">*</span></label>
	<div class="col-sm-9">
		<input type="file" class="form-control" name="store_image" id="store_image">
		<span class="help-block">
			<font color="red"> {{ $errors->has('store_image') ? "".$errors->first('store_image')."" : '' }} </font>
		</span>

		@if(@$store->store_image)
			<img height="50px" width="50px" src = "{{ asset('storage/store_image/').'/'.$post->image  }}" alt = "user" class="rounded-circle">
		@endif
	</div>
</div>




<div class="hr-line-dashed"></div>
@section('styles')
<style type="text/css">
	.help-block {
		display: inline-block;
		margin-top: 5px;
		margin-bottom: 0px;
		margin-left: 5px;
	}
	.form-group {
		margin-bottom: 10px;
	}
	.form-control {
		font-size: 14px;
		font-weight: 500;
	}
	#imagePreview {
		width: 135px;
		height: 100%;
		text-align: center;
		margin: 0 auto;
		position: relative;
	}
	#hidden{
		display: none !important;
	}
	#imagePreview img {
		height: 150px;
		width: 150px;
		border: 3px solid rgba(0,0,0,0.4);
		padding: 3px;
	}
	#imagePreview i{
		position: absolute;
		right: 0px;
		background: rgba(0,0,0,0.5);
		padding: 5px;
		border-radius: 50%;
		width: 30px;
		height: 30px;
		color: #fff;
		font-size: 18px;
	}
</style>
@endsection
@section('scripts')
<script>
	$(document).ready(function () {
		$('#store_name').on('keyup onmouseout keydown keypress blur change', function (event) {
			var regex = new RegExp("^[a-zA-Z ._\\b]+$");
			var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			if (!regex.test(key)) {
				event.preventDefault();
				return false;
			}
		});
	});
</script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
	var editor = CKEDITOR.replace( 'description', {
		language: 'en',
		toolbar :
		[
		{ name: 'document', items : [ 'NewPage','Preview' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'
		,'Iframe' ] },
		'/',
		{ name: 'styles', items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'tools', items : [ 'Maximize','-','About' ] }
		],
		extraPlugins: 'notification'
	});

	editor.on( 'required', function( evt ) {
		editor.showNotification( 'This field is required.', 'warning' );
		evt.cancel();
	} );

</script>


@endsection

