<?php
// tests/Feature/AuditFeatureTest.php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuditFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_view_audit_logs()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin)->get('/audit')->assertStatus(200);
    }

    /** @test */
    public function non_admin_cannot_view_audit_logs()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user)->get('/audit')->assertStatus(403);
    }
}
