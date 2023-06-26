<?php

namespace App\Helpers;

// use Google\Client as Google_Client;
use Google_Service_Sheets;
use Google_Client;
// use Google\Service as Google_Service_Sheets;

class GoogleSheetsHelper {
    static function isEmailAlreadyFilled($email)
    {
        $client = new Google_Client();
        $client->setDeveloperKey('AIzaSyD6wtsMqYyFQnbL6qd1B85cyY-T-Ubr5-U');
        // $client->setAuthConfig(storage_path('app/client_secret_492837068822-vp9s01g1l1rkrnm3ksam794s305cc130.apps.googleusercontent.com.json'));
        $client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);
    
        $service = new Google_Service_Sheets($client);
        $spreadsheetId = '1XU1NgE36GQTDEPLHcT7rA_smbdxLDQMUelbLvIdENoM';
        $range = 'Form Responses 1!A:A'; // Replace with the appropriate sheet and column range
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
    
        foreach ($values as $row) {
            if ($row[0] === $email) {
                return true;
            }
        }
    
        return false;
    }
}
