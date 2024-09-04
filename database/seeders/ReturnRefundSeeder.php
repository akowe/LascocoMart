<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use\App\Models\ReturnRefund;

class ReturnRefundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ReturnRefund::create(
        [
            'return_policy' => 'Definitions and key terms
   To help explain things as clearly as possible in this Return & Refund policy, every time any of these terms are referenced, are strictly defined as:
 
*Company: when this policy mentions "Company","we," "us," or "our," it refers to coopmart.ng that is responsible for your information under this Return & Refund policy.

*Customer: refers to the company organization or person that signs up to use the service to manage the relationship with your consumers or service users. 

*Device: any internet connected device such as a phone,tablet,computer or any other device that can be used to visit and use the services 

*Service: refers to the service provided by coopmart.ng as described in the relative terms (if available) and on this platform 

*Website: coopmart.ng site, which can be accessed via this URL:
*You: a person or entity that is registered with coopmart.ng to use the services. 

Return & Refund Policy 
Thanks for shopping at coopmart.ng, we appreciate the fact that you like to buy the stuff we build, we also want to make sure you have a rewarding experience while you are exploring, evaluating and purchasing our products. 
As with any shopping experience there are terms and conditions that apply to transactions at coopmart.ng.
We will be as brief as out attorneys will allow. 
The main thing to remember is that by placing an order or making a purchase at coopmart.ng ,you agree to the terms set forth below along with coopmart.ng privacy policy 

If there is something wrong with the product you bought or if you are not happy with it, you have (15days)to issue a refund and return your item.
If you would like to return a product, the only way would be if you follow the next guide lines.
Refund:
We at coopmart.ng commit ourselves to serving our customers with the best products.  Every single product that you choose is thoroughly inspected, checked for defects and packaged with utmost care.  We do this do edited that you fall in love with our products/service.
Sadly, there are times when we may not have the product(s) that you choose in stock or may face some issues with our inventory and quality check.  In such cases, we may have to cancel your order. You will be intimated about it in advance so that you do not have to worry unnecessarily about your order. 
If you have purchased via online payment (not cash on delivery), then you will be refunded once our team confirm your request.
We carry out thoroughly quality check before processing the ordered item. We take utmost care while packing the product. At the same time we ensure that the items would not get damaged during transit.
Please note that coopmart.ng is not liable  for damages that are caused to the items during transit or transportation.
We will revise your returned product as soon as we receive it and if it follows the guidelines  addressed above, we will proceed to issue a refund of your purchase.
Your refund may take a couple of days to process but you will be notified when you receive your money. 

Shipping 
Coopmart.ng is responsible for return shipping costs. Every returning shipping is paid by coopmart.ng.

Product Availability and Limitations 
Given the popularity and/or supply constraints of some of our products, coopmart.ng may have to limit the number of products available for purchase. Trust us, we are building then as fast as we can. Cooperatives.ng reserves the right to change quantities available for purchase at anytime, even after you place an order. Furthermore, there may be occasions when coopmart.ng confirm your order but subsequently learns that it cannot supply a product you ordered, coopmart.ng will cancel the order and refund your purchase price in full. 
Your Consent 
By using our platform registering an account or making a purchase, you hereby consent to our Return & Refund Policy and agree to its items. 


'
        ]);
    }
}
