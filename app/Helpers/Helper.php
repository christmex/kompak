<?php

namespace App\Helpers;

use App\Models\Responder;
use App\Models\Questionnaire;


class Helper {
    public static function getNewResponderNotification($ids = [3]){
        $getAllQuestionnaire = Questionnaire::where('user_id',backpack_user()->id)->get()->pluck('id')->toArray();
        $getNewResponderNotification = Responder::whereIn('questionnaire_id', $getAllQuestionnaire)->whereIn('responder_request_type_id', $ids)->get()->count();
        return $getNewResponderNotification;
    }

    public static function getTotalResponByResponderRequestType($id){
        $getNewResponderNotification = Responder::where('user_id',backpack_user()->id)->where('responder_request_type_id', $id)->get()->count();
        return $getNewResponderNotification;
    }

    public static function getResponderRequestTypeIcon($id){
        if($id == 1){
            return '
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-loader" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 6l0 -3"></path>
                    <path d="M16.25 7.75l2.15 -2.15"></path>
                    <path d="M18 12l3 0"></path>
                    <path d="M16.25 16.25l2.15 2.15"></path>
                    <path d="M12 18l0 3"></path>
                    <path d="M7.75 16.25l-2.15 2.15"></path>
                    <path d="M6 12l-3 0"></path>
                    <path d="M7.75 7.75l-2.15 -2.15"></path>
                </svg>
            ';
        }
        if($id == 2){
            return '
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-target-arrow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M12 7a5 5 0 1 0 5 5"></path>
                    <path d="M13 3.055a9 9 0 1 0 7.941 7.945"></path>
                    <path d="M15 6v3h3l3 -3h-3v-3z"></path>
                    <path d="M15 9l-3 3"></path>
                </svg>
            ';
        }
        if($id == 3){
            return '
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trophy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 21l8 0"></path>
                    <path d="M12 17l0 4"></path>
                    <path d="M7 4l10 0"></path>
                    <path d="M17 4v8a5 5 0 0 1 -10 0v-8"></path>
                    <path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                </svg>
            ';
        }
        if($id == 4){
            return '
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hammer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M11.414 10l-7.383 7.418a2.091 2.091 0 0 0 0 2.967a2.11 2.11 0 0 0 2.976 0l7.407 -7.385"></path>
                    <path d="M18.121 15.293l2.586 -2.586a1 1 0 0 0 0 -1.414l-7.586 -7.586a1 1 0 0 0 -1.414 0l-2.586 2.586a1 1 0 0 0 0 1.414l7.586 7.586a1 1 0 0 0 1.414 0z"></path>
                </svg>
            ';
        }
    }

    public static function getResponderRequestTypeBackground($id){
        if($id == 1){
            return 'facebook';
        }
        if($id == 2){
            return 'warning';
        }
        if($id == 3){
            return 'green';
        }
        if($id == 4){
            return 'danger';
        }
    }
 
}
