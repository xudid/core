<?php

namespace Core\Mail;

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
     * @param Recepient $from
     * @param Recepient $to
     * @param string $subject
     * @param string $content
     */
    public function __construct(Recepient $from, Recepient $to, string $subject, string $content)
    {
        $this->from = $from;
        $this->recipients[] = $to;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * @param string $replyTo
     * @return self
     */
    public function addRecipient(Recepient $recipient): self
    {
        $this->recipients[] = $recipient;
        return $this;
    }

    /**
     * @param Recepient ...$recepients
     * @return $this
     */
    public function recipients(Recepient ...$recepients)
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

    /**
     * @return array
     */
    public function getRecipients(): array
    {
        return $this->recipients;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getFrom(): Recepient
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
