<div>
    <p>
        Your payment processed successfully on {{ $data->charged_at }}. Your subscription will last for 1 year and auto-renew again next year on {{ $data->renew_at }}.  View your motivational quotes and inspirational songs provided by your friends and family at <a href="https://motivemob.com/inspiration" target="_blank">https://motivemob.com/inspiration</a>. 
    </p>

    <small>Email Address: {{ $data->email }}</small> <br />
    <small>Authentication Type: {{ $data->oauthType }} login</small>
</div>