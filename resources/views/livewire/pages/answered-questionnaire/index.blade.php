<div>
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="row row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="bg-{!! Helper::getResponderRequestTypeBackground(4) !!} text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                {!! Helper::getResponderRequestTypeIcon(4) !!}
                            </span>
                            </div>
                            <div class="col">
                            <div class="font-weight-medium">
                                {!! Helper::getTotalResponByResponderRequestType(4) !!} Kuesioner
                            </div>
                            <div class="text-muted">
                                Butuh Perbaikan
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                        <span class="bg-{!!Helper::getResponderRequestTypeBackground(3) !!} text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            {!! Helper::getResponderRequestTypeIcon(3) !!}
                        </span>
                        </div>
                        <div class="col">
                        <div class="font-weight-medium">
                            {!! Helper::getTotalResponByResponderRequestType(3) !!} Kuesioner
                        </div>
                        <div class="text-muted">
                            Yang Telah Sudah Selesai
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                        <span class="bg-{!!Helper::getResponderRequestTypeBackground(2) !!} text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                            {!! Helper::getResponderRequestTypeIcon(2) !!}
                        </span>
                        </div>
                        <div class="col">
                        <div class="font-weight-medium">
                            {!! Helper::getTotalResponByResponderRequestType(2) !!} Kuesioner
                        </div>
                        <div class="text-muted">
                            Menunggu Peninjauan
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                        <span class="bg-{!!Helper::getResponderRequestTypeBackground(1) !!} text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                            {!! Helper::getResponderRequestTypeIcon(1) !!}
                        </span>
                        </div>
                        <div class="col">
                        <div class="font-weight-medium">
                            {!! Helper::getTotalResponByResponderRequestType(1) !!} Kuesioner
                        </div>
                        <div class="text-muted">
                            Dalam Proses
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2 align-items-center mt-3 mb-5">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                Overview
            </div>
            <h2 class="page-title">
                Kuesioner yang anda kerjakan
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <span class="d-sm-inline">
                    <select class="form-select" wire:model="formResponderRequestType">
                        <option value="">- Semua Kuisioner -</option>
                        @foreach($modelResponderRequestType as $responderRequestType)
                            <option value="{{$responderRequestType->id}}">{{$responderRequestType->responder_request_type_name}}</option>
                        @endforeach
                    </select>
                </span>
            </div>
        </div>
    </div>
    <div class="row row-deck row-cards">
        @if(count($modelResponder))
            @foreach($modelResponder as $responder)
                <div class="col-md-6 col-lg-3" wire:key="responder-{{ $responder->id }}">
                    <div class="card card-stacked card-link card-link-rotate" title="{{$responder->Questionnaire->questionnaire_title}}" role="button">
                        <div class="ribbon ribbon-top bg-{!! Helper::getResponderRequestTypeBackground($responder->responder_request_type_id) !!}">
                            {!! Helper::getResponderRequestTypeIcon($responder->responder_request_type_id) !!}
                        </div>    
                        <div class="card-body">
                            <h3 class="card-title">
                                {{$responder->Questionnaire->questionnaire_title}}
                                <span class="card-subtitle d-block m-0">By {{$responder->Questionnaire->user->name}}</span>
                            </h3>
                            <p class="text-muted">{{$responder->Questionnaire->questionnaire_description}}</p>
                        </div>
                        <div class="card-footer">
                            <!-- Check dulu disini jika status bukan accepted maka tampilkan button jika udh accepted hanya bisa lihat, or tetap nampil buttontapi di halaman mau ngisi di disabled karnasudah di accep -->
                            <a href="{{route('answered-questionnaire.answer',$responder)}}" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{$modelResponder->links()}}
        @else
            @if($modelResponderCount)
                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7"></path><path d="M10 10l.01 0"></path><path d="M14 10l.01 0"></path><path d="M10 14a3.5 3.5 0 0 0 4 0"></path></svg>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                            <h3 class="h1">Oh tidak, Data yang kamu cari belum ada 🔍</h3>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-12">
                <div class="card card-md">
                    <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7"></path><path d="M10 10l.01 0"></path><path d="M14 10l.01 0"></path><path d="M10 14a3.5 3.5 0 0 0 4 0"></path></svg>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                        <h3 class="h1">Oh tidak, kamu belum membantu satu orang pun ☹️</h3>
                        <div class="markdown text-muted">
                            Silahkan klik disini untuk mulai membantu orang lain 
                        </div>
                        <div class="mt-3">
                            <a href="{{backpack_url('find-questionnaire')}}" class="btn btn-primary">Mulai membantu</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>

    <!-- <div class="row row-deck row-cards">
        <div class="col-md-6 col-lg-3">
            <div class="card card-stacked card-link card-link-rotate" role="button">
                <div class="card-body">
                    <h3 class="card-title">
                        Test
                        <span class="card-subtitle d-block m-0">By asdf</span>
                    </h3>
                    <p class="text-muted">taraktak dum</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-stacked card-link card-link-rotate" role="button">
                <div class="card-body">
                    <h3 class="card-title">
                        Test
                        <span class="card-subtitle d-block m-0">By asdf</span>
                    </h3>
                    <p class="text-muted">taraktak dum</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-stacked card-link card-link-rotate" role="button">
                <div class="card-body">
                    <h3 class="card-title">
                        Test
                        <span class="card-subtitle d-block m-0">By asdf</span>
                    </h3>
                    <p class="text-muted">taraktak dum</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-stacked card-link card-link-rotate" role="button">
                <div class="card-body">
                    <h3 class="card-title">
                        Test
                        <span class="card-subtitle d-block m-0">By asdf</span>
                    </h3>
                    <p class="text-muted">taraktak dum</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-stacked card-link card-link-rotate" role="button">
                <div class="card-body">
                    <h3 class="card-title">
                        Test
                        <span class="card-subtitle d-block m-0">By asdf</span>
                    </h3>
                    <p class="text-muted">taraktak dum</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-stacked card-link card-link-rotate" role="button">
                <div class="card-body">
                    <h3 class="card-title">
                        Test
                        <span class="card-subtitle d-block m-0">By asdf</span>
                    </h3>
                    <p class="text-muted">taraktak dum</p>
                </div>
            </div>
        </div>
    </div> -->
</div>
