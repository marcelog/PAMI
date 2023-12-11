<?php

namespace PAMI\Stream;

class Stream
{
    /**
     * @var resource
     */
    protected $context;

    /**
     * @var false|resource
     */
    protected $socket;

    protected ?int $errorCode = null;

    protected ?string $errorMessage = null;

    /**
     * @param string        $address
     * @param float|null    $timeout
     * @param int           $flags
     * @param resource|null $context
     */
    public function __construct(
        string $address,
        ?float $timeout = null,
        int $flags = STREAM_CLIENT_CONNECT,
        $context = null
    ) {
        $this->context = $context ?? stream_context_create();

        $this->socket = stream_socket_client(
            $address,
            $this->errorCode,
            $this->errorMessage,
            $timeout,
            $flags,
            $this->context
        );
    }

    public function isConnected(): bool
    {
        return $this->socket !== false;
    }

    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setBlocking(bool $enable = true): bool
    {
        return stream_set_blocking($this->socket, $enable);
    }

    public function getLine(int $length = 1024, string $eol = "\r\n"): false|string
    {
        return stream_get_line($this->socket, $length, $eol);
    }

    public function read(int $length = 65535): false|string
    {
        // Read something.
        return fread($this->socket, $length);
    }

    public function write(string $message): false|int
    {
        return fwrite($this->socket, $message);
    }

    public function endOfFile(): bool
    {
        return feof($this->socket);
    }

    public function close(): bool
    {
        return stream_socket_shutdown($this->socket, STREAM_SHUT_RDWR);
    }
}