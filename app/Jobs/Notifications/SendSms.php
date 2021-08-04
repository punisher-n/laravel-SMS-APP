<?php

namespace App\Jobs\Notifications;

use App\Service\Notifications\Sms;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    protected $phone;

    /**
     * @var
     */
    protected $text;

    /**
     * Create a new job instance.
     *
     * SendSms constructor.
     * @param $phone
     * @param $text
     */
    public function __construct($phone, $text)
    {
        $this->phone = $phone;
        $this->text = $text;
    }

    /**
     * Execute the job.
     *
     *
     * @return void
     */
    public function handle()
    {
        $phone = str_replace("+", "", $this->phone);

            $sms = new Sms($phone, $this->text);
            $response = $sms->send();

            Log::info($response);
        }

}
