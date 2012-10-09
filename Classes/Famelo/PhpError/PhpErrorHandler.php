<?php
namespace Famelo\PhpError;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * A basic but solid exception handler which catches everything which
 * falls through the other exception handlers and provides useful debugging
 * information.
 *
 * @Flow\Scope("singleton")
 */
class PhpErrorHandler extends \TYPO3\Flow\Error\AbstractExceptionHandler {
	/**
	 * Constructs this exception handler - registers itself as the default exception handler.
	 *
	 */
	public function __construct() {
		require(dirname(__FILE__) . '/../../../Resources/PHP/php-error/php_error.php');
    	\php_error\reportErrors(array(
    		"application_root" => FLOW_PATH_ROOT
    	));
	}

	/**
	 * Formats and echoes the exception as XHTML.
	 *
	 * @param \Exception $exception The exception object
	 * @return void
	 */
	protected function echoExceptionWeb(\Exception $exception) {}

	/**
	 * Formats and echoes the exception for the command line
	 *
	 * @param \Exception $exception The exception object
	 * @return void
	 */
	protected function echoExceptionCli(\Exception $exception) {}
}

?>