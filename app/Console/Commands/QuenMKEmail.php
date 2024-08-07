<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class QuenMKEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:quen-m-k-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $email = 'locnguyen13504kk8386@gmail.com';

        $user = User::where('email', $email)->first();

        if ($user) {
            $password = $user->password;

            Mail::send('mail', ['password' => $password], function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('Mật Khẩu của bạn');
            });
        } else {
            
        }
    }
}