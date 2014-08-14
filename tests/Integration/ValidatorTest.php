<?php

class ValidatorTest extends GuardianTestCase {

    protected $validator;

    public function setUp()
    {
        parent::setUp();
        $this->prepareDB();
        $this->validator = $this->app->make('Usman\Guardian\Validators\UserValidator');
    }

    public function test_successfull_validation_on_create()
    {
        $valid = $this->validator->setFields($this->userValidData())->validate('create');
        
        $this->assertTrue($valid);
    }

    /**
     * @expectedException Usman\Guardian\Validators\Exceptions\ValidationException
     */
    public function test_failed_validation_on_create()
    {
        $this->validator->setFields($this->userInValidData())->validate('create');
    }

    public function test_successfull_validation_on_update()
    {
        $valid = $this->validator->setFields($this->userValidData())->validate('update');

        $this->assertTrue($valid);
    }

    /**
     * @expectedException Usman\Guardian\Validators\Exceptions\ValidationException
     */
    public function test_failed_validation_on_update()
    {
        $this->validator->setFields($this->userInValidData())->validate('update');
    }


    protected function userValidData() 
    {
        return [
            'username'=>'newuser',
            'password' => 'pass12346',
            'password_confirmation' => 'pass12346',
            'email' => 'xyz@xyz.com',
            'active' => 1
            ];
    }

    protected function userInValidData()
    {
        return [
            'username'=>'noman',
            'password' => 'pass123',
            'email' => 'xyz',
            'active' => 'active'
            ];
    }
}