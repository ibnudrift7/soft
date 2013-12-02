<?php
/**
 * Common functions
 * 
 * @author Deory Pandu
 * @link http://con.cept.me
 */
class Common {

    public static function mail($config = array())
    {
        // bila from tidak di setting
        $config['from'] = ($config['from']=='')?'info@bethesda-clinic.com':$config['from'];
        $config['bcc'] = ( empty($config['bcc']) )? array('deoryzpandu@gmail.com'):$config['bcc'];
        // echo $config['to']."<br>";
        // echo $config['message'];
        // exit;
        self::mailMail($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        // self::mailSmtp($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        // self::mailTest();
    }
    public static function mailMail($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
        // multiple recipients
        $to = ( is_array($to) )? implode(', ', $to) : $to;
        $cc = ( is_array($cc) )? implode(', ', $cc) : $cc;
        $bcc = ( is_array($bcc) )? implode(', ', $bcc) : $bcc;
        //$to = 'deory <deoryzpandu@gmail.com>';
        //$from = 'no-reply <no-reply@markdesign.net>';
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: ' . $to . " \r\n";
        $headers .= 'From: ' . $from . " \r\n";
        if ($cc!='') {
        $headers .= 'Cc: '. $cc . " \r\n";
        }
        if ($bcc!='') {
        $headers .= 'Bcc: '. $bcc . " \r\n";
        }

        // Mail it
        mail($to, $subject, $message, $headers);
    }
     public function mailSmtp($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
            $to = ( is_array($to) )? implode(', ', $to) : $to;
            $cc = ( is_array($cc) )? implode(', ', $cc) : $cc;
            $bcc = ( is_array($bcc) )? implode(', ', $bcc) : $bcc;

            $tujuan = "ibnudrift@gmail.com";

            Yii::import('application.extensions.phpmailer.JPhpMailer');
            $mail = new JPhpMailer;
            
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->Mailer = "smtp";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "deo@markdesign.net"; // SMTP username
            $mail->Password = "markdesigndeo"; // SMTP password 
            
            $mail->ClearAddresses();

            $mail->AddAddress($tujuan, $tujuan);

            $mail->From = 'deo@markdesign.net';
            $mail->FromName = 'deo@markdesign.net';
            $mail->AddReplyTo($from, $from);
            $mail->Html = TRUE;
            $mail->Subject = $subject;
            $mail->MsgHTML($message);
            $mail->Send();
    }

    public function mailTest()
    {
        // multiple recipients
        // $to  = 'deoryzpandu@gmail.com' . ', '; // note the comma
        $to .= 'deoryzpandu@gmail.com';

        // subject
        $subject = 'Birthday Reminders for August';

        // message
        $message = '
        <html>
        <head>
          <title>Birthday Reminders for August</title>
        </head>
        <body>
          <p>Here are the birthdays upcoming in August!</p>
          <table>
            <tr>
              <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
            </tr>
            <tr>
              <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
            </tr>
            <tr>
              <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
            </tr>
          </table>
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: deory <deoryzpandu@gmail.com>' . "\r\n";
        $headers .= 'From: no-reply <no-reply@markdesign.net>' . "\r\n";
        // $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        // $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

        // Mail it
        mail($to, $subject, $message, $headers);
        exit;
    }
}