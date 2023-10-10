<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;
    
    public int $seriesId;

    public string $seriesName;

    public int $qtdSeasons;

    public int $episodesPerSeason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $seriesId, string $seriesName, int $qtdSeasons, int $episodesPerSeason)
    {
        $this->seriesId = $seriesId;
        $this->seriesName = $seriesName;
        $this->qtdSeasons = $qtdSeasons;
        $this->episodesPerSeason = $episodesPerSeason;

        $this->subject = "Série {$seriesName} criada";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.series-created');
    }
}
