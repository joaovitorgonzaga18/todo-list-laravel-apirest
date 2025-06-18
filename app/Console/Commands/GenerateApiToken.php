<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateApiToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a JWT token for API access';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $customClaims = [
            'sub' => 'api-access',
            'iat' => time(),
            'exp' => time() + 120 * 60, // 120 minutos em segundos
        ];

        $payloadFactory = app(\Tymon\JWTAuth\Factory::class);
        $payload = $payloadFactory->customClaims($customClaims)->make();
    
        $token = app(\Tymon\JWTAuth\JWT::class)->encode($payload);

        $this->info("JWT token generated (valid for 2h):\n\n{$token->get()}\n");
    }
}
