@extends(backpack_view('blank'))

@once
  @push('befor_styles')
  <livewire:styles/>
  @endpush
@endonce

@section('content')
<div>
    <div class="row g-2 align-items-center">
        <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
            Overview
        </div>
        <h2 class="page-title">
            My Question
        </h2>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-6 col-lg-4">
            <div class="card">
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
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Selesaikan Kuisioner</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Bukti sudah mengisi kuesioner</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi * <span class="form-label-description">*Optional</span></label>
                        <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Jika ada, apa yang ingin anda katakan kepada pemilik kuisioner?.."></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Selesaikan Kuisioner</button>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            {!! $questionnaire->questionnaire_embed_link !!}
        </div>
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