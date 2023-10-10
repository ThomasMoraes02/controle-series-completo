<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeriesCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $seriesId;

    public string $seriesName;

    public int $seasonsQty;

    public int $episodesPerSeason;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $seriesId, string $seriesName, int $seasonsQty, int $episodesPerSeason)
    {
        $this->seriesId = $seriesId;
        $this->seriesName = $seriesName;
        $this->seasonsQty = $seasonsQty;
        $this->episodesPerSeason = $episodesPerSeason;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
