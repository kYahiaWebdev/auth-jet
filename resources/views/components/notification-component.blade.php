<div {{$attributes}}>
    <h3 class="text-lg font-bold mb-4">Notifications ({{count($notifications)}}):</h3>
    @foreach ($notifications as $notification)
        <p>User {{$notification->data['commentor']}} commented on post {{$notification->data['post']}}</p>
    @endforeach
</div>