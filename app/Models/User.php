<?php

namespace App\Models;

use Carbon\Carbon;
use Dyrynda\Database\Support\NullableFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Billable;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use NullableFields;
    use TwoFactorAuthenticatable;

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
        'share_link',
        'ip_address',
        'country',
        'zip_codezip_code',
        'profile_photo_path',
    ];

    /**
     * The attributes that are nullable.
     *
     * @var string[]
     */
    protected $nullable = [
        'grade_year',
        'sport_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
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

    public function numberOfQuotes()
    {
        return $this->hasMany(Inspiration::class)->where('quote_id', '!=', null)->count();
    }

    public function numberOfSongs()
    {
        return $this->hasMany(Inspiration::class)->where('album_name', '!=', null)->count();
    }

    public function todolist()
    {
        return $this->hasOne(Todolist::class);
    }

    public function inspirations()
    {
        return $this->hasOne(Inspiration::class);
    }

    public function setting()
    {
        return $this->hasOne(Setting::class, 'user_id', 'id');
    }

    public function isSubscribed()
    {
        return $this->subscribed(config('services.stripe.subscription_plan'));
    }

    public function isCancelled()
    {
        return config('services.stripe.subscription_plan') != null ?
         $this->subscription(config('services.stripe.subscription_plan'))->canceled() : null;
    }

    public function isOnGracePeriod()
    {
        return config('services.stripe.subscription_plan') != null ?
         $this->subscription(config('services.stripe.subscription_plan'))->onGracePeriod() : null;
    }

    public function isEnded()
    {
        return config('services.stripe.subscription_plan') != null ?
         $this->subscription(config('services.stripe.subscription_plan'))->ended() : null;
    }

    public function getCurrentPeriodEnd()
    {
        /** @phpstan-ignore-next-line */
        $timestamp = $this->subscriptions()->first()->asStripeSubscription()->current_period_end;

        return Carbon::createFromTimeStamp($timestamp)->toFormattedDateString();
    }

    public function shareLink()
    {
        return env('APP_URL').'/'.'share/'.$this->share_link.'/'.str_replace(' ', '', strtolower($this->name));
    }
}
