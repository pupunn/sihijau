<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $nama_sekolah;
    public $npsn;
    public $email;
    public $password;
    public function __construct($nama_sekolah, $npsn, $email, $password)
    {
        $this->nama_sekolah = $nama_sekolah;
        $this->npsn = $npsn;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@gsr.com')
            ->subject('Berkas Berhasil Terverifikasi')
            ->view('emails.posts');
    }
}
