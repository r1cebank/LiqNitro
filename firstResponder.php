<?php
function FirstResponder($status) {
	if($status != CODE::OK) {
		switch($status) {
			case CODE::FORBIDDEN:
				die("FORBIDDEN");
			break;
			case CODE::NOT_FOUND:
				die("NOT_FOUND");
			break;
			case CODE::INVALID_RECORD:
				die("INVALID_RECORD");
			break;
			case CODE::THROTTLED:
				die("THROTTLED");
			break;
			case CODE::LOCKED:
				die("LOCKED");
			break;
			case CODE::EXIST:
				die("EXIST");
			break;
			case CODE::INVALID_PARAM:
				die("INVALID_PARAM");
			break;
			case CODE::SERVER_ERROR:
				die("SERVER_ERROR");
			break;
			case CODE::SERVICE_UNAVAILABLE:
				die("SERVICE_UNAVAILABLE");
			break;
		}
	}
}
?>