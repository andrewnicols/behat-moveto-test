<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;
use Lemonade\Entity\User;
use ParagonIE\Halite\Alerts\InvalidKey;
use ParagonIE\Halite\HiddenString;
use ParagonIE\Halite\Symmetric\Crypto;
use ParagonIE\Halite\Symmetric\EncryptionKey;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * @When /^I hover over the element "([^"]*)"$/
     */
    public function iHoverOverTheElement($locator)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find('css', $locator);

        if (null === $element) {
            throw new InvalidArgumentException(sprintf('No element matching "%s" could be found', $locator));
        }

        $element->mouseOver();
    }

    /**
     * @When /^I wait (\d*) seconds?$/
     */
    public function iWait($sec)
    {
        sleep($sec);
    }
}
