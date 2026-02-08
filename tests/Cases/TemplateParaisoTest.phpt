<?php declare(strict_types = 1);

namespace Tests\Cases;

use Contributte\Invoice\Preview\PreviewFactory;
use Contributte\Invoice\Templates\ParaisoTemplate;
use Contributte\Tester\Toolkit;

require_once __DIR__ . '/../bootstrap.php';

Toolkit::test(static function (): void {
	(new ParaisoTemplate())->renderToPdf(PreviewFactory::createOrder());
	(new ParaisoTemplate())->renderToSvg(PreviewFactory::createOrder());
});
