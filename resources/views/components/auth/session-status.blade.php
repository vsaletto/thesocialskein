<!-- resources/views/components/auth/session-status.blade.php -->
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif
