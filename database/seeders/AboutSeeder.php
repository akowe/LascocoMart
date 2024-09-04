<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use\App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        About::create(
        [
            'about'     => 'Our mission keeps us focused and accountable, Our vision drives is and 
                            our values dictate how we succeed. To best understand How we are different, we invite you to learn about our story.',
            'our_story' => 'Coopmart.ng has set out to disrupt the cooperative industry, purposely 
                            founded by our founders to give cooperatives and its members a new and 
                            splendid shopping experience.
                            Coopmart.ng offers unprecedented shopping experience by developing a customized, cost effective and time saving platform for cooperatives and its members, building a thoughtful solution based on our clients unique needs.
                            We feel confident that we can provide you a professional and effective solution in a timely manner. 
                                All we do at coopmart.ng is built upon the foundation of our value, integrity, empathy, trust, diversity and inclusion. 
                                We are committed to providing and extraordinary standard of care and service not only to our people, clients and strategic partners but to our community.

'
        ]);
    }
}
