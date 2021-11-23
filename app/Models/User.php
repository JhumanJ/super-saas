<?php

namespace App\Models;

use App\Http\Controllers\SubscriptionController;
use App\Models\Notion\Form;
use App\Models\Notion\Workspace;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Rickycezar\Impersonate\Models\Impersonate;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject //, MustVerifyEmail
{
    use Notifiable, HasFactory, Billable;

    const ADMINS = ['example@email.com'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hear_about_us'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'hear_about_us'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'photo_url',
        'is_subscribed',
        'has_enterprise_subscription',
        'admin',
        'has_customer_id'
    ];

    protected $withCount = [];

    /**
     * Get the profile photo URL attribute.
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        return vsprintf('https://www.gravatar.com/avatar/%s.jpg?s=200&d=%s', [
            md5(strtolower($this->email)),
            $this->name ? urlencode("https://ui-avatars.com/api/$this->name") : 'mp',
        ]);
    }

    public function getIsSubscribedAttribute()
    {
        return $this->subscribed() || $this->subscribed(SubscriptionController::ENTERPRISE_SUBSCRIPTION_NAME);
    }

    public function getHasEnterpriseSubscriptionAttribute()
    {
        return $this->subscribed(SubscriptionController::ENTERPRISE_SUBSCRIPTION_NAME);
    }

    public function getHasCustomerIdAttribute()
    {
        return !is_null($this->stripe_id);
    }

    public function getAdminAttribute()
    {
        return in_array($this->email, self::ADMINS);
    }

    /**
     * =================================
     *  Helper Related
     * =================================
     */

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * =================================
     *  Oauth Related
     * =================================
     */

    /**
     * Get the oauth providers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oauthProviders()
    {
        return $this->hasMany(OAuthProvider::class);
    }

    /**
     * @return int
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
