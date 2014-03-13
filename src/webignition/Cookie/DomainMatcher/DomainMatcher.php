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
        
        if ($this->isHostnameIpv4Address()) {
            return false;
        }
        
        if ($this->isExactMatch()) {
            return true;
        }
        
        if ($this->isCookieDomainSuffixOfHostname()) {
            return true;
        }
        
        return false;
    }
    
    
    /**
     * 
     * @return boolean
     */
    private function isCookieDomainSuffixOfHostname() {
        $reversedHostname = strrev($this->hostname);
        $reversedCookieDomain = strrev($this->cookieDomain);
        
        $hostnameLength = strlen($reversedHostname);
        $cookieDomainLength = strlen($reversedCookieDomain);
        
        for ($index = 0; $index < $cookieDomainLength; $index++) {
            if ($index > $hostnameLength - 1) {                
                return (($index == $cookieDomainLength - 1) && $reversedCookieDomain[$index] == '.');
            } else {
                if ($reversedCookieDomain[$index] != $reversedHostname[$index]) {
                    return false;
                }                
            }
        }
        
        return true;
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
     * @return boolean
     */
    private function isHostnameIpv4Address() {
        return preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $this->hostname);
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