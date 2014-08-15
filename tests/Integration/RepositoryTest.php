<?php

class RepositoryTest extends GuardianTestCase {

    protected $repo;

    public function setUp()
    {
        parent::setUp();
        $this->prepareDB();
        $this->repo = $this->app->make('Usman\Guardian\Repositories\Interfaces\UserRepositoryInterface');
    }   

    public function test_find_by_id()
    {
        $data = $this->repo->findById(1);
        
        $this->assertEquals('riaz',$data->username);
    }

    public function test_find_by_id_with()
    {
        $data = $this->repo->findByIdWith(1,'roles');
        
        $this->assertTrue( ! empty($data['relations']));
        $this->assertInstanceOf('Illuminate\Support\Collection', $data->roles);

    }

    public function test_get_by_page_with()
    {
        $data = $this->repo->getByPageWith('roles');
        
        $this->assertTrue( ! empty($data[0]['relations']));
        $this->assertInstanceOf('Illuminate\Pagination\Paginator', $data);
    }

    public function test_get_all()
    {
        $data = $this->repo->getAll();
        
        $this->assertInstanceOf('Illuminate\Support\Collection', $data);
    }

    public function test_create()
    {
        $id = $this->repo->create([
            'username'=>'user1',
            'email'=>'xyz@xyz.com',
            'password'=>'pass123',
            'active'=>false
            ]);
        
        $this->assertInternalType('int', $id);
    }

    public function test_update()
    {
        $status = $this->repo->update(1,['username'=>'usman','active'=>1]);
        $data = $this->repo->findById(1);

        $this->assertTrue($status);
        $this->assertEquals('usman',$data->username);
        $this->assertEquals('1',$data->active);

    }

    public function test_attach()
    {
        $this->repo->attach(1,[1,3],'roles');
        $data = $this->repo->findByIdWith(1,'roles');

        $this->assertContains(3,$data->roles->modelKeys());
    }

    public function test_delete_with()
    {
        $status = $this->repo->deleteWith(2,['roles']);
        $roles = DB::table('role_user')->whereUserId(2)->get();

        $this->assertTrue($status);
        $this->assertEmpty($roles);
    }

    public function test_delete()
    {
        $this->assertTrue($this->repo->delete(4));
    }

    public function test_search_user_by_role()
    {
        $data = $this->repo->searchUserByRole('an','Administrator');
    
        $this->assertInstanceOf('Illuminate\Pagination\Paginator',$data);
        $this->assertRegExp('/an/', $data[0]->username);
        $this->assertContains('Administrator',$data[0]->roles->lists('role_name'));
    }

    /*public function tearDown()
    {
        Artisan::call('migrate:reset');
    }*/
}
