<?php

namespace Xudid\Core\Mail;

/**
 * Class Message
 * @package Core\Mail
 */
class Message
{
    private string $type = 'HTML';
    private Recepient $from;
    private string $subject;
    private string $content;
    private array $recipients = [];

    /**
     * Message constructor.
     */
    public function __construct(Recepient $from, Recepient $to, string $subject, string $content)
    {
        $this->from = $from;
        $this->recipients[] = $to;
        $this->subject = $subject;
        $this->content = $content;
    }

    public function addRecipient(Recepient $recipient): static
    {
        $this->recipients[] = $recipient;
        return $this;
    }

    public function recipients(Recepient ...$recepients): static
    {
        if (is_array($recepients)) {
            $this->recipients = array_merge($this->recipients, $recepients);
        } else {
            foreach ($recepients as $recepient) {
                $this->recipients[] = $recepient;
            }
        }
        return $this;
    }

    public function getRecipients(): array
    {
        return $this->recipients;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getFrom(): Recepient
    {
        return $this->from;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
