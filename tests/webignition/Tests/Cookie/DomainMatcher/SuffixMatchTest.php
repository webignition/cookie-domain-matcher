<?php

namespace webignition\Tests\Cookie\DomainMatcher;

use webignition\Cookie\DomainMatcher\DomainMatcher;

class SuffixMatchTest extends BaseTest {
    
    public function testDotCookieDomainSuffixMatch() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertTrue($domainMatcher->isMatch('.example.com', 'www.example.com'));
    }
    
    public function testDotCookieSubdomainDomainSuffixMatch() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertTrue($domainMatcher->isMatch('.blog.example.com', 'foo.blog.example.com'));
    }    
    
}