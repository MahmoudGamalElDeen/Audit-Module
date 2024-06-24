<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\UserActionLog;
use App\Models\SystemEventLog;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuditTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_logs_user_actions()
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get('/some-action');
        $this->assertDatabaseHas('user_action_logs', ['user_id' => $user->id, 'action' => 'some-action']);
    }

    /** @test */
    public function it_logs_system_events()
    {
        event(new \App\Events\DatabaseUpdated(['table' => 'users', 'action' => 'update']));
        $this->assertDatabaseHas('system_event_logs', ['event' => 'database_update']);
    }
}
