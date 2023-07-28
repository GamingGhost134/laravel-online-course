<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $token;

    /**
     * Create a new message instance.
     *
     * @param  User  $user
     * @param  string  $token
     * @return void
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

     public function build()
     {
         // Create the reset URL with the token as a parameter
         $resetUrl = url('/reset-password/' . $this->token);

         // You can customize the subject and view for the email here
         return $this->subject('Password Reset')->view('email.password_reset', [
             'resetUrl' => $resetUrl, // Pass the reset URL to the email view
         ]);
     }
}
?>
