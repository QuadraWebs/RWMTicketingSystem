
<h2>Stripe Webhook Error</h2>
<p><strong>Error Message:</strong> {{ $errorMessage }}</p>
<p><strong>Timestamp:</strong> {{ now() }}</p>
<p><strong>Payload:</strong></p>
<pre>{{ print_r($payload, true) }}</pre>
<p><strong>Stack Trace:</strong></p>
<pre>{{ $errorTrace }}</pre>
