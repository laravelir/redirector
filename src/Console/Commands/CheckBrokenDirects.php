<?php

namespace Laravelir\Redirector\Console\Commands;

use Illuminate\Console\Command;

use Laravelir\Redirector\Models\Redirector;

class CheckBrokenDirects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redirector:check-health';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Iterates over the redirects to check if they're healthy";

    public function handle(): int
    {
        Redirector::all()->each(function (Redirect $redirect) {
            $httpCode = $this->getHttpCode($redirect->to_url);

            $redirect->healthy = $httpCode >= 200 && $httpCode < 300;
            $redirect->save();

            if (!$redirect->healthy) {
                event(new DetectedBrokenRedirect($redirect));
            }
        });

        return 0;
    }

    /**
     * @param string $url
     * @return int
     */
    private function getHttpCode(string $url): int
    {
        $r = curl_init($url);
        curl_setopt($r, CURLOPT_HEADER, true);
        curl_setopt($r, CURLOPT_NOBODY, true);
        curl_setopt($r, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($r, CURLOPT_TIMEOUT, 10);
        curl_exec($r);

        $c = curl_getinfo($r, CURLINFO_HTTP_CODE);
        curl_close($r);

        return (int)$c;
    }
}
