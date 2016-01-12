<?php

/* 
 * Functional tests for the forgot password screen
 */
class ForgotPasswordFunctionalTest extends TestCase
{
    /**
     * Checks that viewing the forgot password screen is not possible if logged in
     * 
     * @todo Check the error is contained within an error class
     */
    public function testRedirectAndErrorIfLoggedIn()
    {
        // Check we get a redirect and error here
        $this
            ->loginTestUser()
            ->visitForgotPasswordPage()
            ->seePageIs('/')
            ->see("If you have forgotten your password, please sign out first");
    }

    /**
     * Checks that the user is given an easy, explicit route back to the login page
     */
    public function testRememberedPasswordAfterAllLinkExists()
    {
        $this
            ->visitForgotPasswordPage()
            ->click("Aha, I've remembered my password")
            ->seePageIs('/login');
    }

    /**
     * Checks that the submission of an empty email address results in an error
     * 
     * @todo Check that the error appears in an error class/style
     */
    public function testSubmitEmptyEmail()
    {
        $this
            ->submitEmail('')
            ->see("The email field cannot be empty");
    }

    /**
     * Test that the submission of an invalid email results in an error
     * 
     * Valid means "contains exactly one @ symbol, and at least one dot in the domain part"
     */
    public function testInvalidEmail()
    {
        // No alias part
        $this->submitInvalidEmail('@example.com');

        // No domain
        $this->submitInvalidEmail('test@');

        // No valid TLD
        $this->submitInvalidEmail('test@example');

        // Too many at symbols
        $this->submitInvalidEmail('test@@example.com');

        // No at symbol
        $this->submitInvalidEmail('test+example.com');
    }

    /**
     * Test that the submission of a valid email results in a success message
     * 
     * Note there is no distinction between addresses that exist and those that do not.
     * In test mode, no actual email should be sent.
     * 
     * @todo Check that the success message is in a success CSS class
     * @todo Is there a Laravel feature to check that an email has been sent?
     */
    public function testValidEmail()
    {
        $this
            ->submitEmail('test@example.com')
            ->see("Your password reminder request has been received, and an email will be sent to the specified address");
    }

    /**
     * Submits the specified email address in the forgotten password page
     * 
     * @param string $email
     * @return ForgotPasswordFunctionalTest
     */
    protected function submitEmail($email)
    {
        return $this->visitForgotPasswordPage()
            ->type($email, 'email')
            ->pressSubmit();
    }

    /**
     * Submits the specified email address and checks for an invalid error
     * 
     * @todo Check the error appears in an error class
     * 
     * @param string $email
     * @return ForgotPasswordFunctionalTest
     */
    protected function submitInvalidEmail($email)
    {
        return $this
            ->submitEmail($email)
            ->see("That email address is  not valid");
    }

    /**
     * Visits the password reset page in a nice self-contained method
     * 
     * @return ForgotPasswordFunctionalTest
     */
    protected function visitForgotPasswordPage()
    {
        return $this->visit('/forgot-password');
    }

    /**
     * Submits the password reset form
     * 
     * @return ForgotPasswordFunctionalTest
     */
    protected function pressSubmit()
    {
        return $this->press("Send password reset link");
    }
}
