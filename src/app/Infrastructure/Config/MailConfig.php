<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 16:13:18
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 19:11:17
 * @ Description:
 */

namespace App\Infrastructure\Config;

use App\Domain\Config\MailConfigInterface;
use PHPMailer\PHPMailer\PHPMailer;

class MailConfig implements MailConfigInterface
{
    private PHPMailer $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer();
        $this->mailer->SMTPDebug  = $_ENV["MAIL_DEBUG_MODE"];
        $this->mailer->SMTPSecure = $_ENV['MAIL_SMTP_SECURE'];
        $this->mailer->isSMTP();
        $this->mailer->Host       = $_ENV["MAIL_SMTP_HOST"];
        $this->mailer->SMTPAuth   = $_ENV["MAIL_SMTP_AUTH"];
        $this->mailer->Username   = $_ENV["MAIL_SMTP_USERNAME"];
        $this->mailer->Password   = $_ENV["MAIL_SMTP_PASSWORD"];
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mailer->Port       = $_ENV["MAIL_SMTP_PORT"] ?? 465; 
        $fromEmail = $_ENV["SENDER_EMAIL"] ?? "noreply@levart-app.com";
        $fromName = $_ENV["SENDER_NAME"] ?? "Levart-App";
        $this->mailer->setFrom($fromEmail, $fromName);
    }

    public function mailer() {
        return $this->mailer;
    }
}