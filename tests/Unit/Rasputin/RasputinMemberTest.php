<?php

namespace Tests\Unit\Rasputin;

use App\Lib\Rasputin\RasputinMember;
use Illuminate\Http\Client\ConnectionException;
use Tests\TestCase;

class RasputinMemberTest extends TestCase {

    /**
     * @throws ConnectionException
     */
    public function test_title_fetch() : void {

        $member = new RasputinMember(config('services.levelcrush.rasputin.test.membership'));
        $titles = $member->titles();

        //todo: flesh out this unit test more with expectd responses
        // for now this is ok
        $this->assertIsArray($titles);

        echo '==== Titles ===='.PHP_EOL;
        print_r($titles);
        echo '==== End Titles ===='.PHP_EOL;
    }

}
