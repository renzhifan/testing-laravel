<?php

namespace Tests\Unit;

use App\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamTest extends TestCase
{
    /** @test */
    public function testATeamHasAName()
    {
        $team = new Team(['name' => 'Acme']);

        $this->assertEquals('Acme',$team->name);
    }
    /** @test */
    public function testATeamCanAddMembers()
    {
        $team = factory('App\Team')->create();

        $user = factory('App\User')->create();
        $userTwo = factory('App\User')->create();

        $team->add($user);
        $team->add($userTwo);

        $this->assertEquals(2,$team->count());
    }
    public function testATeamHasAMaximumSize()
    {
        $team = factory('App\Team')->create(['size' => 2]);

        $user = factory('App\User')->create();
        $userTwo = factory('App\User')->create();

        $team->add($user);
        $team->add($userTwo);

        $this->assertEquals(2,$team->count());

        $this->expectException('Exception');

        $userThree = factory('App\User')->create();

        $team->add($userThree);
    }

    public function testATeamCanAddMultipleMembersAtOnce()
    {
        $team = factory('App\Team')->create();

        $users = factory('App\User',2)->create();

        $team->add($users);

        $this->assertEquals(2,$team->count());
    }
    public function testATeamCanRemoveMembers()
    {
        $team = factory('App\Team')->create();

        $users = factory('App\User',2)->create();

        $team->add($users);

        $team->remove($users[0]);

        $this->assertEquals(1,$team->count());
    }
    public function testATeamCaneRmoveAllMembersAtOnce()
    {
        $team = factory('App\Team')->create();

        $users = factory('App\User',2)->create();

        $team->add($users);

        $team->restart($users);

        $this->assertEquals(0,$team->count());
    }
    public function testATeamCanRemoveMoreThanOneMembersAtOnce()
    {
        $team = factory('App\Team')->create(['size' => 3]);

        $users = factory('App\User',3)->create();

        $team->add($users);

        $team->remove($users->slice(0,2));

        $this->assertEquals(1,$team->count());
    }

}
