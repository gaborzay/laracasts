<?php

use App\Validators\Spam;
use Illuminate\Http\Request;
use Prophecy\Argument;

class SpamTest extends TestCase
{
    /** @test */
    function you_may_not_use_any_forbidden_keywords()
    {
        $this->seeValidationExceptionWithRequest('Title', 'HD Streaming Online');
    }

    /** @test */
    function you_may_not_type_korean()
    {
        $this->seeValidationExceptionWithRequest('궤귀규', '궤귀규');
    }

    /** @test */
    function you_may_not_hold_a_key_down()
    {
        $this->seeValidationExceptionWithRequest('titleeeeeeee');
    }

    /** @test */
    function you_must_click_the_captcha_checkbox()
    {
        $this->seeValidationExceptionWithRequest('Title', 'Body', $shouldSucceed = false);
    }



    protected function seeValidationExceptionWithRequest($title, $body, $shouldSucceed = true) {
        app()->instance('App\Utilities\Curl', $this->mockCurlRequest($shouldSucceed));

        $this->setExpectedException('App\Validators\ValidationException');

        (new Spam)->search($this->request($title, $body));
    }

    protected function request($title, $body)
    {
        return Request::create(
            null, 'GET', compact('title', 'body')
        );
    }

    protected function mockCurlRequest($shouldSucceed = true)
    {
        $curl = $this->prophesize('App\Utilities\Curl');

        $curl->post(Argument::any(), Argument::any())
            ->willReturn(json_encode(['success' => $shouldSucceed]));

        return $curl->reveal();
    }
}
