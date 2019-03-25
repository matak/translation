<?php

/**
 * This file is part of the Translette\Translation
 */

declare(strict_types=1);

namespace Translette\Translation\LocalesResolvers;

use Nette;
use Translette;


/**
 * @author Ales Wita
 * @author Filip Prochazka
 */
class Header implements ResolverInterface
{
	use Nette\SmartObject;

	/** @var Nette\Http\Request */
	private $httpRequest;


	/**
	 * @param Nette\Http\Request $httpRequest
	 */
	public function __construct(Nette\Http\Request $httpRequest)
	{
		$this->httpRequest = $httpRequest;
	}


	/**
	 * @param Translette\Translation\Translator $translator
	 * @return string|null
	 */
	public function resolve(Translette\Translation\Translator $translator): ?string
	{
		return $this->httpRequest->detectLanguage($translator->availableLocales);
	}
}