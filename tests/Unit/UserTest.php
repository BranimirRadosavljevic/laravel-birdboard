<?php

namespace Tests\Unit;

use App\User;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_has_projects()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }

    /** @test */
    public function a_user_has_accessible_projects()
    {
        $pera = $this->signIn();

        ProjectFactory::ownedBy($pera)->create();

        $this->assertCount(1, $pera->accessibleProjects());

        $mara = factory(User::class)->create();
        $zika = factory(User::class)->create();

        $maraProject = ProjectFactory::ownedBy($mara)->create();
        $maraProject->invite($zika);

        $this->assertCount(1, $pera->accessibleProjects());

        $maraProject->invite($pera);

        $this->assertCount(2, $pera->accessibleProjects());

        
    }
}
