Hello {{$user->name}},
You changed your email, so we need to verify this new addresss. Please use the link below:
{{route('verify', $user->verification_token)}}