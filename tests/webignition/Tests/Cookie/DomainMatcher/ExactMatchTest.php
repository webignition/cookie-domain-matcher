<?php

namespace webignition\Tests\Cookie\DomainMatcher;

use webignition\Cookie\DomainMatcher\DomainMatcher;

class ExactMatchTests extends BaseTest {
    
    public function testTest() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertTrue($domainMatcher->isMatch('example.com', 'example.com'));
    }
    
}