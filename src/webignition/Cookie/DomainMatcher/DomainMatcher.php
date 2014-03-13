<?php

namespace webignition\Cookie\DomainMatcher;

/**
 * Domain-match checking implementing rules defined in RFC6265:
 * http://tools.ietf.org/html/rfc6265#section-5.1.3
 */
class DomainMatcher {
    
    private $cookieDomain;
    private $hostname;
    
    public function isMatch($cookieDomain, $hostname) {        
        $this->cookieDomain = $this->normaliseDomainInput($cookieDomain);
        $this->hostname = $this->normaliseDomainInput($hostname);
        
        if ($this->isExactMatch()) {
            return true;
        }
        
        return false;
    }
    
    
    /**
     * 
     * @return boolean
     */
    private function isExactMatch() {
        return $this->cookieDomain == $this->hostname;
    }
    
    
    /**
     * 
     * @param strings $value
     * @return string
     */
    private function normaliseDomainInput($value) {
        return strtolower(trim($value));
    }
    
}