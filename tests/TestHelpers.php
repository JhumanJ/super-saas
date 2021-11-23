<?php


namespace Tests;


use App\Models\User;
use Illuminate\Support\Str;

trait TestHelpers
{
    /**
     * Creates a workspace for a user
     * @param User $user
     */
    public function createUserWorkspace(User $user) {
        $user->workspaces()->create([
            'access_token' => env('TEST_WORKSPACE_ACCESS_TOKEN'),
            'name' => 'Test workspace',
            'icon' => 'TW'
        ]);

        return $user;
    }

    /**
     * Creates a user with a Pro subscription
     *
     * @param User|null $user
     * @return User|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function actingAsProUser(User $user = null) {
        if ($user == null) {
            $user = \App\Models\User::factory()->create();
        }

        $user->subscriptions()->create([
            'name' => 'default',
            'stripe_id' => Str::random(),
            'stripe_status' => 'active',
            'stripe_price' => Str::random(),
            'quantity' => 1,
        ]);

        test()->actingAs($user);
        return $user;
    }
}
