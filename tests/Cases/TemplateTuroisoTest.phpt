<?php declare(strict_types = 1);

namespace Tests\Cases;

use Contributte\Invoice\Preview\PreviewFactory;
use Contributte\Invoice\Templates\TuroisoTemplate;
use Contributte\Tester\Toolkit;

require_once __DIR__ . '/../bootstrap.php';

Toolkit::test(static function (): void {
	(new TuroisoTemplate())->renderToPdf(PreviewFactory::createOrder());
	(new TuroisoTemplate())->renderToSvg(PreviewFactory::createOrder());
});
