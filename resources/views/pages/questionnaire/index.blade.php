@extends(backpack_view('blank'))

@once
  @push('befor_styles')
  <livewire:styles/>
  @endpush
@endonce

@section('content')
<livewire:pages.questionnaire.index /> 
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