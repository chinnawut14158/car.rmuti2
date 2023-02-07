<?php
include_once __DIR__ . '/vendor/autoload.php';
session_start();

$timeST = $_SESSION['timeGST'];
$timeEND = $_SESSION['timeGEND'];
$location = $_SESSION['location'];
$request_for = $_SESSION['request_for'];
$in_out = $_SESSION['in_out'];
$email = $_SESSION['email'];

$postData = $statusMsg = $valErr = ''; 
$status = 'danger'; 
// if (php_sapi_name() != 'cli') {
//     throw new Exception('This application must be run on the command line.');
// }

use Google\Client;
use Google\Service\Calendar;

/**
 * Returns an authorized API client.
 * @return Client the authorized client object
 */
function getClient()
{
    $client = new Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    // $client->setAuthConfig('credentials.json');
    $client->setAuthConfig('client_secret_233474493134-j7gatp5nlfi57it1v608vnf3g6pdjb06.apps.googleusercontent.com.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Calendar($client);

// Print the next 10 events on the user's calendar.
try{

    $calendarId = 'primary';
    $optParams = array(
        'maxResults' => 10,
        'orderBy' => 'startTime',
        'singleEvents' => true,
        'timeMin' => "2020-08-02T21:18:44+02:00", //date('c'),
    );
    $results = $service->events->listEvents($calendarId, $optParams);
    $events = $results->getItems();

// Refer to the PHP quickstart on how to setup the environment:
// https://developers.google.com/calendar/quickstart/php
// Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
// credentials.

$event = new Google_Service_Calendar_Event(array(
    'summary' => $in_out,
    'location' => $location,
    'description' => $request_for,
    'start' => array(
      'dateTime' => $timeST,
      'timeZone' => 'Asia/Bangkok',
    ),
    'end' => array(
      'dateTime' => $timeEND,
      'timeZone' => 'Asia/Bangkok',
    ),
    'recurrence' => array(
      'RRULE:FREQ=DAILY;COUNT=1'
    ),
    'attendees' => array(
      array('email' => $email),
    //   array('email' => 'sbrin@example.com'),
    ),
    'reminders' => array(
      'useDefault' => FALSE,
      'overrides' => array(
        array('method' => 'email', 'minutes' => 24 * 60),
        array('method' => 'popup', 'minutes' => 60),
      ),
    ),
  ));
  
  $calendarId = 'c_ac78mfc3u8f3f3ns43unbk1lhk@group.calendar.google.com';
  $event = $service->events->insert($calendarId, $event);
  printf('Event created: %s\n', $event->htmlLink);

    if (empty($events)) {
        print "No upcoming events found.\n";
    } else {
        print "All events:<br/>\n";
        foreach ($events as $event) {
            $start = $event->start->dateTime;
            if (empty($start)) {
                $start = $event->start->date;
            }
            printf("%s %s (%s)\n", $event->getSummary(), $event->getDescription(), $start);
            print "<br/>";
        }
    }
    // echo date('c');
    echo "<script> alert('บันทึกสำเร็จ'); window.location = './line_notify.php';</script>";
}
catch(Exception $e) {
    // TODO(developer) - handle error appropriately
    echo 'Message: ' .$e->getMessage();
}


?>