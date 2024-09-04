<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use\App\Models\Privacy;

class PrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Privacy::create(
        [
            'privacy_policy' => 'Protecting the privacy of users of the (CoopMart.ng)website is important to us. Our Online Privacy Statement is designed to inform you about our collection and use of personal information on this website. From time to time, CoopMart.ng may make changes to this Online Privacy Statement, so we encourage you to check back and review it regularly to ensure you are aware of current practices.

By accessing the website at https://www.coopmart.ng, you are agreeing to be bound by these Terms of Service and all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this website are protected by applicable copyright and trademark law.

The following terminology applies to these Terms and Conditions, Privacy Statement, Disclaimer Notice, and any or all agreements:

“You” and “Your” refer to you, the person accessing this website and accepting the Company’s Terms and Conditions.

“Coopmart”, “The Company”, “Ourselves”, “We”, “Our”, and “Us”, refer to coopmart.ng.

“Party”, “Parties”, or “Us”, refers to both you and ourselves, or either you or ourselves.

Any use of the above terminology or other words in the singular, plural, capitalisation, and/or he/she or they are taken as interchangeable and therefore as referring to same.

COLLECTION OF PERSONAL INFORMATION
The personal information we collect about you on this website is the information that you provide to us. This information may include name, email address, and phone number. We may also collect information during your visit to the coopmart.ng website through our Automatic Data Collection Tools, which include cookies, embedded Web links, and Internet Protocol (IP) address.

This personal information is only obtained when you voluntarily provide the information to us.

HOW WE USE COLLECTED INFORMATION
We may use the personal information with which you provide us to:

provide you with the information you have requested;
perform analytics and other value-added services;
facilitate and complete merchant-initiated or authorised transactions;
comply with federal, state, and local laws, including card association rules;
verify information and combat fraud; or
communicate other information about coopmart.ng and its services that we believe you would find interesting.
KEEPING YOUR INFORMATION SECURE
At coopmart.ng, security is a priority and we are committed to protecting the information that we collect. Coopmart.ng has advanced security technology to protect personal information collected online against unauthorised access, disclosure, alteration, or destruction. The advanced security technology may include, among others, encryption, physical access security, and other appropriate technologies. Coopmart.ng reviews and enhances its security systems as necessary.

DISCLAIMER
The materials on coopmart.ng website are provided on an “as is” basis. Coopmart.ng makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.

Furthermore, coopmart.ng does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any websites linked to this website.

LIMITATIONS
In no event shall coopmart.ng be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on coopmart.ng website, even if coopmart.ng or a coopmart.ng-authorised representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties or limitations of liability for consequential or incidental damages, these limitations may not apply to you.

GOVERNING LAW
These terms and conditions are governed by and construed in accordance with the laws of the Federal Republic of Nigeria and you irrevocably submit to the exclusive jurisdiction of the courts in that state or location.

'
        ]);
    }
}
