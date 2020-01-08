  <?php

  require_once('/Users/jsinn/Desktop/RecurlyJS/lib/recurly.php');

  Recurly_Client::$subdomain = 'justinsinndev';
  Recurly_Client::$apiKey = 'cd0747852eaf4de29901a006852262aa';
  
try {
    $tokenId = $_POST['recurly-token'];

    $subscription = new Recurly_Subscription();
    $subscription->plan_code = '100';
    $subscription->currency = 'USD';
    $account_code = uniqid();

    $subscription->account = new Recurly_Account($account_code);
    $subscription->account->first_name = 'Justin';
    $subscription->account->last_name = 'Sinn';

    $subscription->account->billing_info = new Recurly_BillingInfo();
    $subscription->account->billing_info->token_id = $tokenId;

    $subscription->create();

  } catch (Exception $e) {

    $error = $e->getMessage();

  }

//if (isset($error)) {
//    return $response->withRedirect("file:///Users/jsinn/Desktop/RecurlyJS/paypal/paypal.html");
//  } else {
//    return $response->withRedirect("file:///Users/jsinn/Desktop/RecurlyJS/paypal/paypal.html");
//  };