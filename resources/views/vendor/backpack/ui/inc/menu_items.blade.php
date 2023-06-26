{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('questionnaire') }}"><i class="nav-icon la la-question"></i> Kuesioner Saya</a></li>
<li class="nav-item"><a class="nav-link" href="{{backpack_url('find-questionnaire')}}"><i class="nav-icon la la-search"></i> Cari Kuesioner</a></li>
<li class="nav-item position-relative"><a class="nav-link" href="{{backpack_url('answered-questionnaire')}}"><i class="nav-icon la la-trophy"></i> Kuisioner Yang Saya Isi @if(Helper::getTotalResponByResponderRequestType(4))<span class="badge bg-danger badge-notification badge-pill">{{Helper::getTotalResponByResponderRequestType(4)}}</span>@endif</a></a></li>

@if(backpack_user()->email == 'super@admin.com')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="true">
    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M12.003 21c-.732 .001 -1.465 -.438 -1.678 -1.317a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c.886 .215 1.325 .957 1.318 1.694"></path>
   <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
   <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
   <path d="M19.001 15.5v1.5"></path>
   <path d="M19.001 21v1.5"></path>
   <path d="M22.032 17.25l-1.299 .75"></path>
   <path d="M17.27 20l-1.3 .75"></path>
   <path d="M15.97 17.25l1.3 .75"></path>
   <path d="M20.733 20l1.3 .75"></path>
</svg>
    </span>
    <span class="nav-link-title">
        Master Data
    </span>
    </a>
    <div class="dropdown-menu" data-bs-popper="static">
    <div class="dropdown-menu-columns">
        <div class="dropdown-menu-column">
        <a class="dropdown-item" href="{{ backpack_url('form-category') }}"><i class="nav-icon la la-sort-alpha-up"></i> Form categories</a>
        <a class="dropdown-item" href="{{ backpack_url('responder-request-type') }}"><i class="nav-icon la la-question"></i> Responder request types</a>
        </div>
    </div>
    </div>
</li>
@endif
<li class="nav-item position-relative"><a class="nav-link" href="{{ backpack_url('responder') }}"><i class="nav-icon la la-question"></i> Responders @if(Helper::getNewResponderNotification())<span class="badge bg-twitter badge-notification badge-pill">{{Helper::getNewResponderNotification()}}</span>@endif</a></li>