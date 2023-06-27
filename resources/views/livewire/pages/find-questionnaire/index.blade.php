<div>
    <div class="row g-2 align-items-center">
        <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
            Overview
        </div>
        <h2 class="page-title">
            Find Questionnaire
        </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
            <span class="d-sm-inline">
                <select class="form-select" wire:model="formFormCategory">
                    <option value="">- Semua Kategory -</option>
                    @foreach($modelFormCategory as $formCategory)
                        <option value="{{$formCategory->id}}">{{$formCategory->form_category_name}}</option>
                    @endforeach
                </select>
            </span>
            <span class="d-sm-inline">
                <select class="form-select" wire:model="formUser">
                    <option value="">- Semua Pengguna -</option>
                    @foreach($modelUser as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </span>
            <!-- <a href="#" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
            <path d="M21 21l-6 -6"></path>
            </svg>
            Cari
            </a>

            <a href="#" class="btn btn-primary d-sm-none btn-icon" aria-label="Cari">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
            <path d="M21 21l-6 -6"></path>
            </svg>
            </a> -->
        </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="alert alert-success mb-2 " role="alert"> 
                <h4 class="alert-heading">Horeee, Ini Adalah versi Beta Aplikasi Kompak 🙌</h4>
                <p>Jika terdapat hal hal yang tidak seharusnya terjadi, atau anda membutuhkan bantuan, dapat mengirim report kepada kami <strong><a href="http://kompak.test/app/report">disini</a></strong>, feedback anda sangat berarti untuk kami, terima kasih.</p>
            </div>
        </div>
        <!-- <div class="col-12">
            <div class="card card-md">
                <div class="card-stamp card-stamp-lg">
                <div class="card-stamp-icon bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7"></path><path d="M10 10l.01 0"></path><path d="M14 10l.01 0"></path><path d="M10 14a3.5 3.5 0 0 0 4 0"></path></svg>
                </div>
                </div>
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-10">
                    <h3 class="h1">Selamat datang</h3>
                    <div class="markdown text-muted">
                        Di halaman ini anda dapat mencari semua jenis kuesioner
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row row-deck row-cards">
        @if(count($modelQuestionnaire))

            @foreach($modelQuestionnaire as $questionnaire)
                @if(($questionnaire->questionnaire_target - $questionnaire->countAllAcceptedResponder() > 0))
                <div class="col-md-6 col-lg-3" wire:key="questionnaire-{{ $questionnaire->id }}">
                    <div class="card card-stacked card-link card-link-rotate" title="{{$questionnaire->questionnaire_title}}" role="button">
                        @if($questionnaire->questionnaire_target <= 10)
                            <div class="ribbon bg-yellow">
                                {{$questionnaire->questionnaire_target - $questionnaire->countAllAcceptedResponder()}} responded lagi
                            </div>
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                {{$questionnaire->questionnaire_title}}
                                <span class="card-subtitle d-block m-0">By {{$questionnaire->user->name}}</span>
                            </h3>
                            <p class="text-muted">{{$questionnaire->questionnaire_description}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('answered-questionnaire.answer',$questionnaire)}}" class="btn btn-primary">Saya Mau Bantu</a>
                            @if(backpack_user()->id == $questionnaire->user_id)
                                <a href="{{route('questionnaire.edit',$questionnaire)}}" class="btn btn-link">Ubah</a>
                            @endif
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
                            <h3 class="h1">Oh tidak, Data yang kamu cari belum ada 🔍</h3>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach

            {{$modelQuestionnaire->links()}}
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
                    <h3 class="h1">Oh tidak, Data yang kamu cari belum ada 🔍</h3>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
