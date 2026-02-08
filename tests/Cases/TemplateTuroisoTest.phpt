<?php declare(strict_types = 1);

namespace Tests\Cases;

use Contributte\Invoice\Preview\PreviewFactory;
use Contributte\Invoice\Templates\TuroisoTemplate;
use Contributte\Tester\Toolkit;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

Toolkit::test(static function (): void {
	$pdf = (new TuroisoTemplate())->renderToPdf(PreviewFactory::createOrder());
	Assert::true(strlen($pdf) > 0);

	$svg = (new TuroisoTemplate())->renderToSvg(PreviewFactory::createOrder());
	Assert::true(strlen($svg) > 0);
});
