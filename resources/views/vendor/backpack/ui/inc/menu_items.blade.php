{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('form-category') }}"><i class="nav-icon la la-sort-alpha-up"></i> Form categories</a></li> -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('questionnaire') }}"><i class="nav-icon la la-question"></i> My Questionnaires</a></li>
<li class="nav-item"><a class="nav-link" href="{{backpack_url('find-questionnaire')}}"><i class="nav-icon la la-search"></i> Find Questionnaires</a></li>
<li class="nav-item"><a class="nav-link" href="{{backpack_url('answered-questionnaire')}}"><i class="nav-icon la la-trophy"></i> Answered Questionnaires</a></li>