<?php

namespace Qafoo;

class ExampleTest extends \PHPUnit_Framework_TestCase
{
    public function testCorrectQuestionAnswer()
    {
        $exampleSubject = new Example();

        $answer = $exampleSubject->getQuestionAnswer();

        $this->assertEquals(
            42,
            $answer
        );
    }
}
