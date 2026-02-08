<?php declare(strict_types = 1);

namespace Tests\Cases;

use Contributte\Invoice\Data\Company;
use Contributte\Tester\Toolkit;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

Toolkit::test(static function (): void {
	$company = new Company('name', 'town', 'address', 'zip', 'country', 'vatNumber', 'id');

	Assert::same('name', $company->getName());
	Assert::same('town', $company->getTown());
	Assert::same('address', $company->getAddress());
	Assert::same('zip', $company->getZip());
	Assert::same('country', $company->getCountry());
	Assert::same('vatNumber', $company->getVatNumber());
	Assert::same('id', $company->getId());
});
