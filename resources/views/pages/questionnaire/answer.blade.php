@extends(backpack_view('blank'))

@once
  @push('befor_styles')
  <livewire:styles/>
  @endpush
@endonce


@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex mb-2 align-items-end d-print-none">
        <h3 class="text-capitalize mb-0" style="line-height: 30px;">Jawab Kuisioner</h3>
    </section>
@endsection

@section('content')

<div class="row">
	<div class="{{ $crud->getCreateContentClass() }} col-12 col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Detail Kuisioner</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Judul Kuisioner</label>
                    <input type="text" class="form-control" value="{{$questionnaire->questionnaire_title}}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi Kuisioner </label>
                    <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="{{$questionnaire->questionnaire_description}}" disabled></textarea>
                </div>
            </div>
        </div>
		{{-- Default box --}}

		@include('crud::inc.grouped_errors')

		  <form method="post"
		  		action="{{ url($crud->route) }}"
				@if ($crud->hasUploadFields('create'))
				enctype="multipart/form-data"
				@endif
		  		>
			  {!! csrf_field() !!}
		      {{-- load the view from the application if it exists, otherwise load the one in the package --}}
		      @if(view()->exists('vendor.backpack.crud.form_content'))
		      	@include('vendor.backpack.crud.form_content', [ 'fields' => $crud->fields(), 'action' => 'create' ])
		      @else
		      	@include('crud::form_content', [ 'fields' => $crud->fields(), 'action' => 'create' ])
		      @endif
                {{-- This makes sure that all field assets are loaded. --}}
                <div class="d-none" id="parentLoadedAssets">{{ json_encode(Basset::loaded()) }}</div>
	          @include('crud::inc.form_save_buttons')
		  </form>
	</div>
    <div class="col-md-12 col-lg-8">
        <div class="card my-3 my-lg-0 ">
            <div class="card-header">
                <h3 class="card-title">Screenshoot mulai bagian ini jika selesai</h3>
            </div>
            <div class="card-body">
                <p>Kuisioner ini diisi oleh {{backpack_user()->name}} pada tanggal {{date('Y-m-d')}}</p>
            </div>
        </div>
        {!! $questionnaire->questionnaire_embed_link !!}
    </div>
</div>

@endsection


@once
  @push('after_scripts')
    <livewire:scripts/>
    <script>
    window.addEventListener('alert_dispatch', event => {
      new Noty({
          type: event.detail.type,
          text: event.detail.text,
      }).show();
    })
    </script>
  @endpush
@endonce
