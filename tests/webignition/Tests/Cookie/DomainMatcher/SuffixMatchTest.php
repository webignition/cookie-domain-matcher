<?php

namespace webignition\Tests\Cookie\DomainMatcher;

use webignition\Cookie\DomainMatcher\DomainMatcher;

class SuffixMatchTest extends BaseTest {
    
    public function testSuffixMatch() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertTrue($domainMatcher->isMatch('.example.com', 'www.example.com'));
    }
    
}