<?php

namespace webignition\Tests\Cookie\DomainMatcher;

use webignition\Cookie\DomainMatcher\DomainMatcher;

class NotMatchCasesTest extends BaseTest {
    
    public function testIPv4Hostname() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertFalse($domainMatcher->isMatch('.example.com', '127.0.0.1'));
    }
    
    public function testCookieDomainSubdomainDiffersFromHostnameSubdomain() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertFalse($domainMatcher->isMatch('www.example.com', 'blog.example.com'));        
    }
    
    public function testDotlessCookieDomainDoesNotMatchSubdomain() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertFalse($domainMatcher->isMatch('example.com', 'blog.example.com'));                
    }
    
    public function testDotCookieSubdomainDoesNotMatchBareHostname() {
        $domainMatcher = new DomainMatcher(); 
        $this->assertFalse($domainMatcher->isMatch('.foo.example.com', 'example.com'));                
    }
    
}