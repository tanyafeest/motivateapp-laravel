<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use App\Actions\Util\EncodeURIComponent;
use Carbon\Carbon;
use App\Models\Inspiration;
use App\Models\Todolist;
use App\Models\Setting;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
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
        'share_link',
        'profile_photo_path'
    ];

    /**
     * The attributes that are nullable.
     *
     * @var string[]
     */
    protected $nullable = [
        'grade_year',
        'sport_id',
        'playlist_id'
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

    // get public share link
    public function shareLink()
    {
        return config('app.url') . 'share/' . $this->share_link . "/" . str_replace(" ", "",strtolower($this->name));
    }

    // get encoded URI of mail
    public function encodedMail()
    {
        $encodeURIComponent = new EncodeURIComponent();

        return 'mailto:?subject=' . $encodeURIComponent->encode('Share a song or quote with me, please!') . '&body=' . $encodeURIComponent->encode('Check out <a href="' . $this->shareLink() . '">' . $this->shareLink() . '<a/>, where you can recommend a motivational song or inspiring quote for me.');
    }

    // get number of quotes
    public function numberOfQuotes()
    {
        return $this->hasMany(Inspiration::class)
            ->where('quote_id', '!=', null)
            ->count();
    }

    // get number of songs
    public function numberOfSongs()
    {
        return $this->hasMany(Inspiration::class)
            ->where('track_id', '!=', null)
            ->count();
    }

    // check subscription is  done
    public function isSubscribed() {
        return $this->subscribed(config('services.stripe.subscription_plan'));
    }

    // check subscription is cancelled
    public function isCanceled() {
        return $this->subscription(config('services.stripe.subscription_plan')) !== null && $this->subscription(config('services.stripe.subscription_plan'))
            ->canceled();
    }

    // check the user is on grade period
    public function isOnGracePeriod() {
        return $this->subscription(config('services.stripe.subscription_plan')) !== null && $this->subscription(config('services.stripe.subscription_plan'))
            ->onGracePeriod();
    }

    // check subscription is ended
    public function isEnded() {
        return $this->subscription(config('services.stripe.subscription_plan')) !== null && $this->subscription(config('services.stripe.subscription_plan'))
            ->ended();
    }

    // get current period end
    public function getCurrentPeriodEnd() {
        $timestamp = $this->subscriptions[0]
            ->asStripeSubscription()
            ->current_period_end;

        return Carbon::createFromTimeStamp($timestamp)
            ->toFormattedDateString();
    }

    // get todolist of user
    public function todolist() {
        return $this->hasOne(Todolist::class);
    }

    // get all inspirations of this user
    public function inspirations() {
        return $this->hasMany(Inspiration::class);
    }

    // get user's setting
    public function setting() {
        return $this->hasOne(Setting::class);
    }
}
