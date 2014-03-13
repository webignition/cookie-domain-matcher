<?php

namespace webignition\Tests\Cookie\DomainMatcher;

use webignition\Cookie\DomainMatcher\DomainMatcher;

class NotMatchCasesTest extends BaseTest {
    
    public function testIPv4Hostname() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertFalse($domainMatcher->isMatch('.example.com', '127.0.0.1'));
    }
    
}