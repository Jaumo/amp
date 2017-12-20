<?php

namespace Amp\Loop;

use Amp\Struct;

class Watcher {

    public static $DEBUG_TRACES = false;
    public static $DEBUG_TRACE_LIMIT = 7;

    use Struct;

    const IO = 0b00000011;
    const READABLE = 0b00000001;
    const WRITABLE = 0b00000010;
    const DEFER = 0b00000100;
    const TIMER = 0b00011000;
    const DELAY = 0b00001000;
    const REPEAT = 0b00010000;
    const SIGNAL = 0b00100000;

    public function __construct() {
        if (self::$DEBUG_TRACES) {
            $this->backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, self::$DEBUG_TRACE_LIMIT);
        }
    }

    /** @var int */
    public $type;

    /** @var bool */
    public $enabled = true;

    /** @var bool */
    public $referenced = true;

    /** @var string */
    public $id;

    /** @var callable */
    public $callback;

    /**
     * Data provided to the watcher callback.
     *
     * @var mixed
     */
    public $data;

    /**
     * Watcher-dependent value storage. Stream for IO watchers, signal number for signal watchers, interval for timers.
     *
     * @var mixed
     */
    public $value;

    public $backtrace;
}
