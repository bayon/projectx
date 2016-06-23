<?php
/*
admin@forteworks.COM
Tw1l10Bay0n!
 * 
 number:502-684-2345
 * +15026842345
 * Acct: SID: AC8ccb32ff03d9da9bf010d0ff0d6d02a2
 
 * Auth Token:  4dc3aaf4a8ccb7df46139acc97ed0fc7
<?php
/*
admin@forteworks.COM

Tw1l10Bay0n!
 number:502-684-2345
 * Acct: SID: AC8ccb32ff03d9da9bf010d0ff0d6d02a2
 * 
 * Auth Token:  4dc3aaf4a8ccb7df46139acc97ed0fc7
 * 
 * 
 */
 
 /*  PHP LIBRARY:
  * https://www.twilio.com/docs/libraries/php
Once you download the library, move the twilio-php folder to your project directory and then include the library file:
require '/path/to/twilio-php/Services/Twilio.php';
  */
?>
 */
echo('<hr>on<hr>');
require_once "Services/Twilio.php";
echo('<hr>on<hr>');
$AccountSid = "AC8ccb32ff03d9da9bf010d0ff0d6d02a2"; // Your Account SID from www.twilio.com/console {{ account_sid }}
$AuthToken = "4dc3aaf4a8ccb7df46139acc97ed0fc7";   // Your Auth Token from www.twilio.com/console
echo('<hr>on<hr>');
$client = new Services_Twilio($AccountSid, $AuthToken);
echo('<hr>on<hr>');
try{
$message = $client->account->messages->create(array(
    "From" => "+15026842345", // From a valid Twilio number
    "To" => "+18122670592",   // Text this number  +18122673327  verify # 913 627
    "Body" => "Hello Bayon from PHP",
));} catch (Services_Twilio_RestException $e){
	 echo $e->getMessage();
}
echo('<hr>on<hr>');
// Display a confirmation message on the screen
//echo "Sent message {$message->sid}";
echo('foo');
?>