<?php

namespace jbr\SurrealDB;

class Emitter {
	protected $events = [];

	public function on($e, $func) {
		if (gettype($this->events[$e]) === 'object') {
			$this->events[$e] = [];
		}

		array_push($this->events[$e], $func);
	}

	public function off($e, $func) {
		if (gettype($this->events[$e]) !== "object") return;

		$idx = array_search($func, $this->events);

		if ($idx === false) return;

		$this->events = array_splice($this->events[$e], $idx, 1);
	}

	public function once($e, $func) {
		function f(...$args) {
			$this->off($e, f);
			$func($this, ...$args);
		}

		$this.on($e, f);
	}

	public function emit($e, ...$args) {
		if (gettype($this->events[$e]) !== "object") return;

		foreach ($this->events[$e] as $key => $func) {
			$func($this, ...args);
		}
	}

	public function removeAllListeners($e) {
		if (isset($e)) {
			if (gettype($this->events[$e]) !== "object") return;

			$this->events[$e] = [];

			return;
		}

		foreach ($this->events as $key ) {
			$this->events[$key] = [];
		}
	}
}