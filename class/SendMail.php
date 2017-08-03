<?php
/*
 * autor: @takdzwiedz
 * 
 * Class sending e-mails
 */


class SendMail {
            
    private $from, $Cc, $Bcc, $headers, $to, $subject, $message, $htmlCodeStart, $htmlCodeEnd;

    function __construct($from, $Cc='', $Bcc='', $html='yes') { 

        //Variable initialization 

        $this->from=$from;
        $this->Cc=$Cc;
        $this->Bcc=$Bcc;

        $this->headers='';
        $this->htmlCodeStart='';
        $this->htmlCodeEnd='';

        if($html=='yes'){
            $this->htmlCodeStart='
                    <html>
                    <head>
                        <meta charset="UTF-8">
                    </head>
                    <body>
                    ';
            $this->htmlCodeEnd='
                    </body>
                    </html>
                    ';          

        $this->headers="MIME-Version:1.0\r\n"; 
        $this->headers.="Content-type:text/html; charset=UTF-8\r\n";
        }

        $this->headers.="From:$this->from\r\n";

        // Display CC if exist

        if($this->Cc!=''){
            $this->headers.="Cc:$this->Cc\r\n";
        }               

        // Display BCC if exist

        if($this->Bcc!=''){
            $this->headers.="Bcc:$this->Bcc\r\n";
        }

    }

    function send($to, $subject, $message){

        $this->to=$to;

        $this->subject=$subject;
        $this->message=$message;

        $this->message=$this->htmlCodeStart;
        $this->message.=$message;
        $this->message.=$this->htmlCodeEnd;

        $wyslij = mail($this->to, $this->subject, $this->message, $this->headers);
    }
}
