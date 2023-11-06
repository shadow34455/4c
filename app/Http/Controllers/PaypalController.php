<?php

namespace App\Http\Controllers;
  
  use App\Models\Order;
  use App\Models\User;
  use Illuminate\Http\Request;
  use Illuminate\Support\Str;
  use Srmklive\PayPal\Services\PayPal as PayPalClient;
  
  class PaypalController extends Controller
  {
    public $provider;
    
    public function __construct()
    {
      $this->provider = new PayPalClient;
      $this->provider->setApiCredentials(config('paypal'));
      $this->provider->setRequestHeader('PayPal-Partner-Attribution-Id', '&lt;BN_CODE&gt;');
//        $this->provider->setReturnAndCancelUrl(route('dashboard'), route('dashboard'));
      $paypalToken = $this->provider->getAccessToken();
    }
    
    public function connect()
    {
      $provider = new PayPalClient;
      $provider->setApiCredentials(config('paypal'));
      $paypalToken = $provider->getAccessToken();
      $provider->setAccessToken($paypalToken);
      $res = $provider->createPartnerReferral([
        "tracking_id" => uniqid(Str::random(40), true),
        "partner_config_override" => [
          "return_url" => route('connect.success')
        ],
        "operations" => [
          [
            "operation" => "API_INTEGRATION",
            "api_integration_preference" => [
              "rest_api_integration" => [
                "integration_method" => "PAYPAL",
                "integration_type" => "FIRST_PARTY",
                "first_party_details" => [
                  "features" => [
                    "PAYMENT",
                    "REFUND"
                  ],
                ]
              ]
            ]
          ]
        ],
        "products" => [
          "EXPRESS_CHECKOUT"
        ],
        "legal_consents" => [
          [
            "type" => "SHARE_DATA_CONSENT",
            "granted" => true
          ]
        ]
      ]);
      
      //action_url
      if (isset($res['links'])) {
        foreach ($res['links'] as $link) {
          if ($link['rel'] == 'action_url') {
            return redirect()->away($link['href']);
          }
        }
        return redirect()->route('dashboard')->with('something went wrong');
      }
    }
    
    public function connectSuccess(Request $request)
    {
      if (isset($request['merchantId']) &&
        $request['merchantId'] != null &&
        $request['permissionsGranted'] === true &&
        $request['isEmailConfirmed'] === true) {
        redirect()->to(env('APP_URL') . "/dashboard?merchantId=" . $request['merchantId'] . "&merchantIdInPayPal=" . $request['merchantIdInPayPal'] . "&permissionsGranted=true&accountStatus=BUSINESS_ACCOUNT&consentStatus=true&productIntentId=addipmt&isEmailConfirmed=true&returnMessage=To%20start%20accepting%20payments,%20please%20log%20in%20to%20PayPal%20and%20finish%20signing%20up")
          ->with('success', 'your account is Linked Successfully');
      } else {
        redirect()->route('dashboard')->with('error', $request['massage']);
      }
    }
    
    public function processPaypal(Request $request)
    {

//      $response = $this->provider->createOrder([
//        "intent" => "CAPTURE",
//        "application_context" => [
//          "return_url" => route('paypal.success'),
//          "cancel_url" => route('paypal.cancel'),
//        ],
//        "purchase_units" => [
//          0 => [
//            "amount" => [
//              "currency_code" => "USD",
//              "value" => "1.00"
//            ]
//          ]
//        ]
//      ]);
      $order = Order::with('serves')->where('order_no', $request->order_no)->first();
      
      
      $response = $this->provider->createOrder([
        "headers" => "PayPal-Partner-Attribution-Id: &lt;FLAVORsb-u4l7k14614776_MP&gt;",
        "intent" => "CAPTURE",
        "application_context" => [
          "return_url" => route('paypal.success'),
          "cancel_url" => route('paypal.cancel'),
        ],
        "purchase_units" => [
          0 => [
            "amount" => [
              "currency_code" => "USD",
              "value" => "5.00"
            ],
            "payee" => [
              "merchant_id" => "7PYAZ7V939UJW"
            ],
            "payment_instruction" => [
              "disbursement_mode" => "INSTANT",
              "platform_fees" => [
                0 => [
                  "amount" => [
                    "currency_code" => "USD",
                    "value" => "1.00"
                  ],
                  "payee" => [
                    "merchant_id" =>     env("MY_PAYPAL_MARCHENT_ID")

                  ]
                ]
              ]
            ]
          ],
        ]
      ]);
      if (isset($response['id']) && $response['id'] != null) {
        // redirect to approve href
        foreach ($response['links'] as $links) {
          if ($links['rel'] == 'approve') {
            return redirect()->away($links['href']);
          }
        }
        return redirect()
          ->route('orders.index')
          ->with('error', 'Something went wrong.');
      } else {
        return redirect()
          ->route('orders.index')
          ->with('error', $response['message'] ?? 'Something went wrong.');
      }
    }
    
    
    public function processSuccess(Request $request)
    {
      $response = $this->provider->capturePaymentOrder($request['token']);
      
      if (isset($response['status']) && $response['status'] == 'COMPLETED') {
        
        return redirect()
          ->route('dashboard')
          ->with('success', 'Transaction complete.');
        
      } else {
        
        return redirect()
          ->route('dashboard')
          ->with('error', $response['message'] ?? 'Something went wrong.');
        
      }
      
      
    }
    
    
    public
    function processCancel(Request $request)
    
    {
      
      return redirect()
        ->route('orders.index')
        ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
    
    
  }