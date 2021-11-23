<?php

uses(\Tests\TestCase::class);

it('can create pro user who are subscribed', function () {
    $user = $this->actingAsProUser();
    expect($user->is_subscribed)->toBeTrue();
});


it('can create test workspace', function () {
    $user = $this->actingAsProUser();
    $this->createUserWorkspace($user);
    expect($user->workspaces()->count())->toBe(1);
});
