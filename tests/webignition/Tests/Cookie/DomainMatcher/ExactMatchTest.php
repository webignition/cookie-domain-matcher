<?php

namespace webignition\Tests\Cookie\DomainMatcher;

use webignition\Cookie\DomainMatcher\DomainMatcher;

class ExactMatchTest extends BaseTest {
    
    public function testExactMatch() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertTrue($domainMatcher->isMatch('example.com', 'example.com'));
    }
    
}