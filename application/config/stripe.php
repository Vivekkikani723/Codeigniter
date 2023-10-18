<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers » API keys page 
| Remember to switch to your live publishable and secret key in production! 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51MzDjLSJQsi8eNw8qx7HuHJPl4aiW4k3vFKOuUsP9ZdMx0ov2doe9MutofvJkoNTo69Ld1SriAw2Y2krGG4gG2tW00IgoV1MJu'; 
$config['stripe_publishable_key'] = 'pk_test_51MzDjLSJQsi8eNw83ZTW1F2v4opRD5yyqtn4jdwAtffRHUDgDmlzMZqdzILWnXFmDNT81O8V45rJIiPjCggGW01Q00dpdR4Gr6'; 
$config['stripe_currency']        = 'usd';