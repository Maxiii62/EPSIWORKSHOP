<?php
	const PARAM_LOGGED = 'Logged';
	const MESSAGE_ACCESS_DENIED = 'You are not allowed to access to this page.';
	const MESSAGE_REQUEST_ERROR = 'You have an error into a parameter or a parameter is missing for this request.';
	class Helper
	{
		// Check if the current client is logged or not.
		public static function CheckLogin()
		{
			if (session_status() == PHP_SESSION_NONE)
				session_start();
			if (!isset($_SESSION[PARAM_LOGGED]) || $_SESSION[PARAM_LOGGED] == 0)
				self::ThrowAccessDenied();
		}
		// Commentaires
		// Stop the request and send an access denied message to the client.
		public static function ThrowAccessDenied()
		{
			echo MESSAGE_ACCESS_DENIED;
			exit();
		}
		// Stop the request and send an request error message to the client.
		public static function ThrowRequestError()
		{
			echo MESSAGE_REQUEST_ERROR;
			exit();
		}
	}
