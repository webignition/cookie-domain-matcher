<?php

namespace webignition\Tests\Cookie\DomainMatcher;

use webignition\Cookie\DomainMatcher\DomainMatcher;

class DotCookieDomainAndDomainTest extends BaseTest {
    
    public function testDotCookieDomainMatchesBareDomain() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertTrue($domainMatcher->isMatch('.example.com' ,'example.com'));
    }
    
}