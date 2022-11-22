<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Dyrynda\Database\Support\NullableFields;
use App\Models\Inspiration;
use App\Models\Todolist;
use Laravel\Cashier\Billable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use NullableFields;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'gender',
        'age',
        'grade_year',
        'sport_id',
        'share_link'
    ];

    /**
     * The attributes that are nullable.
     *
     * @var string[]
     */
    protected $nullable = [
        'grade_year',
        'sport_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
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
        'profile_photo_url',
    ];

    public function numberOfQuotes() {
        return $this->hasMany(Inspiration::class)->where('quotes_id', '!=', null)->count();
    }

    public function numberOfSongs() {
        return $this->hasMany(Inspiration::class)->where('album_name', '!=', null)->count();
    }

    public function todolist() {
        return $this->hasOne(Todolist::class);
    }

    public function isSubscribed() {
        return $this->subscribed(env('STRIPE_SUBSCRIPTION_PLAN'));
    }

    public function isCancelled() {
        return $this->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->canceled();
    }

    public function isOnGracePeriod() {
        return $this->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->onGracePeriod();
    }

    public function isEnded() {
        return $this->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->ended();
    }

    public function getCurrentPeriodEnd() {
        $timestamp = $this->subscriptions[0]->asStripeSubscription()->current_period_end;

        return Carbon::createFromTimeStamp($timestamp)->toFormattedDateString();
    }
}
