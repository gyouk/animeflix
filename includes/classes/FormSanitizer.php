<?php
class FormSanitizer {
	/**
	 * Sanitize a string input from a form.
	 *
	 * @param $inputText
	 *
	 * @return string
	 */
	public static function sanitizeFormString($inputText) {
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		$inputText = strtolower($inputText);
		$inputText = ucfirst($inputText);
		return $inputText;
	}

	/**
	 * @param $inputText
	 *
	 * @return array|string|string[]
	 */
	public static function sanitizeFormUsername($inputText) {
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}
	public static function sanitizeFormPassword($inputText) {
		$inputText = strip_tags($inputText);
		return $inputText;
	}
	public static function sanitizeFormEmail($inputText) {
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}
}
